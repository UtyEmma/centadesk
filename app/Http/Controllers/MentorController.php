<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorSignupRequest;
use App\Http\Traits\CourseActions;
use App\Http\Traits\MentorActions;
use App\Library\FileHandler;
use App\Library\Notifications;
use App\Library\Response;
use App\Models\Bank;
use App\Models\Batch;
use App\Models\Enrollment;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MentorController extends Controller{
    use MentorActions, CourseActions;

    const HOME = '/me';

    public function mentorInfo(){
        $mentors = Faq::where('type', 'mentor')->get();
        return Response::view('front.mentors.mentorship-about', [
            'mentors' => $mentors
        ]);
    }

    public function index(Request $request){
        $type = 'page';

        $mentors = User::query();

        $mentors->when($request->keyword, function($query, $keyword){
            return $query->where('username', '%like%', $keyword);
        });

        $mentors->when($request->order === 'popularity', function($query){
            return $query->orderBy('rating');
        });

        $mentors->when($request->order === 'rating', function($query){
            return $query->orderBy('rating');
        });

        $mentors->where([
            'role' => 'mentor',
            'kyc_status' => 'approved'
        ]);

        return view('front.mentors', [
            'mentors' => $mentors->paginate(env('PAGINATION_COUNT')),
            'type' => $type
        ]);
    }

    public function home(){
        $query = User::query();
        $mentor = $query->withCount('students')->with('wallet')->first();

        return view('dashboard.index', [
            'user' => $mentor
        ]);
    }

    public function onboarding(Request $request){
        $user = $this->user();

        if($user->role === 'mentor' && $user->kyc_status === 'approved') return redirect(self::HOME);
        $banks = Bank::all();

        return view('front.mentors.onboarding', [
            'banks' => $banks,
            'user' => $user
        ]);
    }

    public function store(MentorSignupRequest $request){
        $user = $this->user();

        $avatar = FileHandler::upload($request->file('avatar')) ?? "";
        $id_image = FileHandler::upload($request->file('id_image')) ?? "";

        $user->update($request->safe()->merge([
            'kyc_method' => Str::slug($request->kyc_method),
            'role' => 'mentor',
            'avatar' => $avatar,
            'id_image' => $id_image
        ])->all());

        $message = [
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', 'We have received your application to become a Mentor on '.env('APP_NAME')),
            Notifications::parse('text', 'Your Application will be duly considered and we will notify you after our review!'),
            Notifications::parse('text', "For the meantime, feel free to check out some amazing Sessions that you might find interesting!"),
            Notifications::parse('action', [
                'link' => route('sessions'),
                'action' => "Find a Session"
            ])
        ];

        $notification = Notifications::builder("Your Mentor Application has been sent! 🎉", $message);
        Notifications::send($user, $notification, ['mail', 'database']);

        return Response::redirectBack('success', 'Your application has been sent! 🎉');
    }

    public function update(Request $request){
        $user = $this->user();

        $avatar = $user->avatar;

        if($request->avatar){
            FileHandler::deleteFile($user->avatar);
            $avatar = FileHandler::upload($request->avatar);
        }

        $request->merge(['avatar' => $avatar]);
        $user->update($request->all());

        return Response::redirectBack('success', "Your Profile has been updated Successfully");
    }

    public function show($username){
        $mentor = User::where('username', $username)->withCount(['courses', 'reviews'])->first();
        if(!$mentor) return Response::redirect('/404', 'error', 'The requested mentor does not exist');
        $batches = Batch::where('mentor_id', $mentor->unique_id)->with('course')->get();

        return Response::view('front.mentor-details', [
            'mentor' => $mentor,
            'batches' => $batches
        ]);
    }

    public function profile(){
        return Response::view('dashboard.profile.details', [
            'user' => $this->user()
        ]);
    }

    public function settings(){
        return Response::view('dashboard.profile.settings', [
            'user' => $this->user()
        ]);
    }

    public function payments(){
        $user = auth()->user();
        $user = User::query();

        $user->find($user->unique_id)
            ->with('bank')
            ->get();

        return Response::view('dashboard.profile.payment', [
            'user' => $user
        ]);
    }

    function requestVerification(){
        $user = $this->user();
        if($user->is_verifided === 'verified') return Response::redirectBack('error', 'Your Account is already verified');

        $user->is_verified = 'requested';
        $user->save();

        return Response::redirectBack('success', 'Your Verification request has been sent');
    }

    function security(){
        return Response::view('dashboard.profile.security');
    }

    function delete(){

        $user = $this->user();
        $wallet = $user->wallet;
        if($wallet->balance > 0) return Response::redirectBack('error', "You cannot delete your account because you still have some pending balance in your Wallet");
        Auth::logout();
        $user->delete();
        return Response::redirect('/login', 'success', "Your Account has been deleted successfully!");

    }
}
