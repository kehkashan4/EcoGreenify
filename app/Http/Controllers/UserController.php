<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::where('role', 'user')->get();;
        return view('Kehkashan.RegisteredUser.usershow',compact('users'));
    }
    public function create(){
        $user=new User();
        return view('Kehkashan.RegisteredUser.userform',compact('user'));
    }
    public function store(Request $request){

        $data=$request->all();
        User::create($data);
        return redirect()->route('admin.user.index');
    }
    public function edit($id){
        $user=User::find($id);
        return view('Kehkashan.RegisteredUser.userform',compact('user'));
    }

    public function update(Request $request,$id){
        $user=User::find($id);
        $data=$request->all();
        $user->update($data);
        return redirect()->route('admin.user.index');
    }
}
