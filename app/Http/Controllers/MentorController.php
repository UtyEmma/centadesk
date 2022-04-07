<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorSignupRequest;
use App\Library\FileHandler;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MentorController extends Controller{

    const HOME = '/me';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $mentors = User::where([
            'role' => 'mentor',
            'kyc_status' => 'approved'
        ])->get();

        return view('front.mentors', [
            'mentors' => $mentors
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('front.mentors.onboarding');
    }

    public function onboarding(){
        return view('front.mentors.onboarding');
    }

    public function store(Request $request){
        $user = $this->user();

        $avatar = FileHandler::upload($request->file('avatar')) ?? "";
        $id_image = FileHandler::upload($request->file('id_image')) ?? "";

        $user->update(array_merge(
            $request->all(), [
                'account_no' => $request->account_number,
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

        return redirect(self::HOME);
    }


    public function show($id)
    {
        //
    }
}
