<?php

namespace App\Http\Controllers;

use App\Events\MentorApplicationCreated;
use App\Events\MentorApplicationSent;
use App\Http\Requests\MentorSignupRequest;
use App\Http\Traits\CourseActions;
use App\Http\Traits\MentorActions;
use App\Library\FileHandler;
use App\Library\Response;
use App\Models\Bank;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Faq;
use App\Models\User;
use App\Notifications\NewMentorAccountRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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

        if($request->keyword){
            $mentors = User::search($request->keyword)
                                ->where('role', 'mentor')
                                ->where('kyc_status', 'approved');
            $type = 'search';
        }else{
            $mentors = User::query();

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
        }

        return view('front.mentors', [
            'mentors' => $mentors->paginate(env('PAGINATION_COUNT')),
            'type' => $type
        ]);
    }

    public function home(){
        $mentor = $this->user();
        $enrollments = Enrollment::where('mentor_id', $mentor->unique_id)->get();
        return view('dashboard.index', [
            'user' => $mentor,
            'enrollments' => $enrollments->count()
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

    public function store(Request $request){
        $user = $this->user();

        $avatar = FileHandler::upload($request->file('avatar')) ?? "";
        $id_image = FileHandler::upload($request->file('id_image')) ?? "";

        $user->update(array_merge(
            $request->all(), [
                'account_no' => $request->account_number,
                'account_name' => $request->account_name,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'kyc_method' => Str::slug($request->kyc_method),
                'desc' => $request->desc,
                'role' => 'mentor',
                'avatar' => $avatar,
                'id_image' => $id_image
            ]
        ));

        MentorApplicationSent::dispatch($user);

        return Response::redirectBack('success', 'Your application has been sent! 🎉');

    }

    public function update(Request $request){
        try {
            $user = $this->user();

            $avatar = $user->avatar;

            if($request->avatar){
                FileHandler::deleteFile($user->avatar);
                $avatar = FileHandler::upload($request->avatar);
            }

            $request->merge(['avatar' => $avatar]);
            $user->update($request->all());
            return Response::redirectBack('success', "Your Profile has been updated Successfully");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
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
        $user = $this->user();
        $bank = Bank::where('code', $user->bank)->first();
        $user->bank = $bank->name;
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
        try {
            $user = $this->user();
            $wallet = $user->wallet;
            if($wallet->balance > 0) return Response::redirectBack('error', "You cannot delete your account because you still have some pending balance in your Wallet");
            Auth::logout();
            $user->delete();
            return Response::redirect('/login', 'success', "Your Account has been deleted successfully!");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
