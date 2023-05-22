<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        $data = [
            'title' => 'Edit Akun',
            'user' => $user
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
    public function update(Request $request, User $user)
    {
        // $attr = $request->validate([
        //     'name' => ['string', 'min:3', 'max:191', 'required'],
        //     'username' => ['required', 'alpha_num', 'unique:users,username' . auth()->id()]
        // ]);

        // auth()->user()->update($attr);

        // return back()->with('message', 'Your Profil has been update');
        $rules = [
            'name' => ['string', 'min:3', 'max:191'],
            'username' => ['alpha_num', 'unique:users,username' . auth()->id()]
        ];

        $validateData = $request->validate($rules);

        $validateData['id'] = auth()->user()->id;

        User::where('id', $user->id)
                ->update($validateData);

        return redirect('/profile/{id}')->with('succes', 'Profile has been update');

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
