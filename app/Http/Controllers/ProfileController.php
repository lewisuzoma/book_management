<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfilePhotoRequest;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.profile');
    }

    public function photo(ProfilePhotoRequest $request, $id)
    {
        $newImageName = time() . '-' . Auth::user()->name . '.' . $request->profile_photo->extension();

        $request->profile_photo->move(public_path('profile_photo'), $newImageName);

        $user = User::where('id', $id)
        ->update([
            'profile_photo' => $newImageName
        ]);

        return redirect('/profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if(!empty($request->profile_photo)){

            $newImageName = time() . '-' . $request->name . '.'. $request->profile_photo->extension();

            $request->profile_photo->move(public_path('profile_photo'), $newImageName);

            User::create([
                'profile_photo' => $newImageName,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => 2
            ]);
        }
        else{

            User::create([
                'profile_photo' => null,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => 2
            ]);
        }

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user = User::find($id);
        return view('profile.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        if(!empty($request->profile_photo)){

            $newImageName = time() . '-' . $request->name . '.'. $request->profile_photo->extension();

            $request->profile_photo->move(public_path('profile_photo'), $newImageName);

            User::where('id', $id)
            ->update([
                'profile_photo' => $newImageName,
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        }
        else{

            User::where('id', $id)
            ->update([
                'profile_photo' => null,
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        }

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/home');
    }
}
