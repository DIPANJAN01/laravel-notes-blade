<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        return view('user.edit', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['nullable', 'string'],
            'email' => ['required', 'string', 'email']
        ]);

        if ($validatedData['email'] !== Auth::user()->email) {
            $existingUser = User::where('email', $validatedData['email'])->first();
            // dd($existingUser);
            if ($existingUser) {
                return to_route('user.edit')->with('message', 'Email already in use by another user!');
            }
        }

        $user = User::where('email', '=', Auth()->user()->email);
        // dd($request->password);
        if ($request->exists('password') && $request->password !== null) {
            $validatedPassword = $request->validate([
                'password' => ['string']
            ]);
            $validatedData['password'] = bcrypt($validatedPassword['password']);
        }
        $user->update($validatedData);
        return to_route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $user = User::find(Auth::id());
        $user->delete();
        return to_route('login')->with('message', 'User deleted!');
    }
}
