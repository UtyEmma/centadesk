<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorSignupRequest;
use App\Library\FileHandler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller{

    const HOME = '/dashboard';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $mentors = User::where('role', 'mentor')->get();

        return view('front.mentors', [
            'mentors' => $mentors
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

    public function mentorSignup(){
        return view('front.mentors.onboarding');
    }

    public function store(Request $request){
        $user = $this->user();

        $avatar = FileHandler::upload($request->file('avatar'), 'mentors', 'public');
        $id_image = FileHandler::upload($request->file('avatar'), 'kyc', 'private');

        $user->update(array_merge(
            $request->all(),
            [
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
