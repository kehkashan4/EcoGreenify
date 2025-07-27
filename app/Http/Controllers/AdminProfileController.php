<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function update(Request $request)
    {
        /** @var \App\Models\User $admin */
        $admin = Auth::user(); // single user model use ho raha hai

        // Check if user is actually an admin
        if (!$admin || $admin->role !== 'admin') {
            return redirect()->back()->withErrors('Unauthorized access.');
        }

        // Validate the incoming request
        $request->validate([
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]+(?: [a-zA-Z]{3,})*$/', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'regex:/^[a-zA-Z0-9]+@gmail\.com$/', 'max:255', 'unique:users,email,' . $admin->id],
            'phone_no' => ['nullable', 'string', 'regex:/^(0|\+92)[0-9]{10}$/'],
            'address' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8}$/', 'confirmed'],
            'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Prepare data for update
        $data = $request->only('name', 'email', 'phone_no', 'address');

        // Handle profile image upload
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $destinationPath = public_path('ecoimages/img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $data['profile'] = $fileName;
        }

        // Handle password update if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update admin (actually user with role = admin)
        $admin->update($data);

        return redirect()->back()->with('success', 'Admin profile updated successfully!');
    }
}
