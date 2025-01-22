<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        
        $profileDetails = DB::table('profile_details')->where('user_id', $user->id)->first();
        
        // Convert merged array to an object (e.g., using a collection)
        $userData = collect(array_merge(
            $user->toArray(),
            $profileDetails ? (array) $profileDetails : []
        ));
        
        //dd($userData);
        return view('profile.edit', [
            'user' => $userData,
        ]);
    }



    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update user model fields
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Handle profile details
        $profileData = $request->only([
            'about',
            'education',
            'current_organization',
            'current_position',
            'skills',
            'interests',
            'experience',
            'role',
            'linkedin',
        ]);

        if ($request->hasFile('profile_picture')) {
            $profileData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Update or create the profile details record
        DB::table('profile_details')->updateOrInsert(
            ['user_id' => $user->id], // Match by user_id
            $profileData // Data to update or insert
        );

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
