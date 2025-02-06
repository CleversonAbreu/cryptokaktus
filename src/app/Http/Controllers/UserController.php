<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $route = 'admin/users';

    public function index()
    {
        return view('admin.user.index');
    }

    public function edit(User $user)
    {
       return view('admin.user.edit', compact('user'));
    }
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserFormRequest $request)
    {
        $validateData = $request->validated();
     
        try {
            $user = new User();
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = bcrypt($validateData['password']);
            $user->users_id = Auth::user()->id;
            $user->save();
      
            return redirect($this->route)->with('success', 'User added successfully');
        } catch (\Exception $e) {
            return redirect($this->route)->with('error', 'Error, user not added  '.$e);
        }
        
    }
    public function update(UserFormRequest $request, $user)
    {
        $validateData = $request->validated();
        $user = User::findOrFail($user);

        try {
            
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = bcrypt($validateData['password']);
            $user->update();
      
            return redirect($this->route)->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect($this->route)->with('error', 'Error, user not updated '.$e);
        }
    }

}
