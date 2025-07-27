<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
     public function update(Request $request)
     {
         // ider user variable User Model ka object hai
         /** @var \App\Models\User $user */
         $user = Auth::user();

         if (!$user) {
        return redirect()->back()->withErrors('User not authenticated.');
        }

         // Validate the incoming request
         $request->validate([
             'name' => ['required', 'string', 'regex:/^[a-zA-Z ]+(?: [a-zA-Z]{3,})*$/', 'min:3', 'max:255'],
             'email' => ['required', 'string', 'email', 'regex:/^[a-zA-Z0-9]+@gmail\.com$/', 'max:255', 'unique:users,email,' .$user->id],
             'password' => ['nullable', 'string', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8}$/', 'confirmed'],
             'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
         ]);

         // Prepare data for updating the user
         $data = $request->only('name', 'email');

         // Check if a new profile image is uploaded
         if ($request->hasFile('profile')) {
             $file = $request->file('profile');
             $destinationPath = public_path('ecoimages/img');  // Specify destination folder
             $fileName = time() . '_' . $file->getClientOriginalName();  // Generate unique file name

             // Move the file to the destination folder
             $file->move($destinationPath, $fileName);

             // Add the image path to the data array
             $data['profile'] = $fileName;
         }

         if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
        }

         // Update the user's details
        $user->update($data);



        // Redirect back with success message
         return redirect()->back()->with('success', 'Profile updated successfully!');
     }
}
