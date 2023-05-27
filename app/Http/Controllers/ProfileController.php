<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Edit Nama',
        ];

        return view('profile.profile', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => ['string', 'min:3', 'max:191', 'required',],
            'username' => ['required', 'alpha_num', 'unique:users,username,' . auth()->id()]
        ]);

        auth()->user()->update($attr);

        return redirect()->route('profile')->with('success', 'Profile has been updated!');

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

    public function viewPassword()
    {
        $data = [
            'title' => 'Edit Password',
        ];

        return view('profile.password', $data);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        if (Hash::check($request->current_password, Auth::user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with('message', 'Ur Password has been updated');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Your Password does not match with our record',
        ]);
    }
}
