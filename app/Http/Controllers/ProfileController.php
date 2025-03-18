<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */


    public function updateProfile(Request $request) : RedirectResponse
    {

        $request->user()->fill($request->validate([
            'name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:50'],
        ]));
        $request->user()->save();
        return Redirect::route('profile.edit');

    }
    public function updateImage(Request $request) : RedirectResponse{
        $oldImage = old('image', $request->user()->image);
        $request->user()->fill($request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]));
        if ($request->hasFile('image')) {
            if ($oldImage) {
                unlink(public_path($oldImage));
            }
            $image = $request->file('image');
            $filename = time() . '_' . rand(0, 100) . '_' . rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads\profileimage'), $filename);
            $request->user()->image = "\uploads\profileimage\\" . $filename;

        }
        $request->user()->save();
        return Redirect::route('profile.edit');
    }

    public function updatePassword(Request $request) : RedirectResponse{
        $request->validate([
            'current_password' => ['required', 'string', 'min:8', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if (Hash::check($request->current_password, $request->user()->password)) {
            $request->user()->password = Hash::make($request->password);
            $request->user()->save();
            return Redirect::route('profile.edit');
        }
        return Redirect::route('profile.edit');
    }
    public function updateEmail(Request $request) : RedirectResponse{
        $request->user()->fill($request->validate([
            'current_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ]));
        $request->user()->save();
        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
