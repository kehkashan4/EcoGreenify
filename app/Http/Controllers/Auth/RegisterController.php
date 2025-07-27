<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]+(?: [a-zA-Z]{3,})*$/', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'regex:/^[a-zA-Z0-9]+@gmail\.com$/', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8}$/', 'confirmed'],
            'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    }

    public function register(Request $request)
    {
        // Validate input
        $this->validator($request->all())->validate();

        $data = $request->all();

        // Handle profile image upload
        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('ecoimages/img'), $imageName);
            $data['profile'] = 'ecoimages/img/' . $imageName;
        } else {
            $data['profile'] = null;
        }

        // Create and log in user
        $user = $this->create($data);
        $this->guard()->login($user);

        return redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile' => $data['profile'] ?? null,
        ]);
    }
}
