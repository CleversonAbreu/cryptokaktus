<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;


class ProfileController extends Controller
{
    public $uploadPath;

    public function __construct()
    {
        $this->uploadPath  = Config::get('constants.UPLOAD_PATH');
    }
    public function index()
    {
       $profile = Profile::where('users_id', Auth::user()->id)->first();
       return view('admin.profile.index', compact('profile'));
    }
     public function update(Request $request, $userId)
     {

        $request->validate([
            'name'     => 'required',
            'password' => 'required|min:8',
            'phone'    => 'required',
            'mobile'   => 'required',
            'address'  => 'required',
        ]);

        $user    = User::findOrFail($userId);
        $profile = Profile::where('users_id', $userId)->first();
       
        try {
            
            $user->name     = request('name');
            $user->password = bcrypt(request('password'));
            $userUpdated    = $user->update();
            if ($userUpdated) {
                if ($request->hasFile('image')) {
                    $file      = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $fileName  = time().'.'.$extension;
                    $file->move($this->uploadPath, $fileName);
                    $finalPathName = $this->uploadPath.$fileName;
                  
                }
                if ($profile) {
                    $profile->phone   = request('phone');
                    $profile->mobile  = request('mobile');
                    $profile->address = request('address');
                    $profile->image   = $finalPathName;
                    $profile->update();
                } else {
                    $profile = new Profile();
                    $profile->phone    = request('phone');
                    $profile->mobile   = request('mobile');
                    $profile->address  = request('address');
                    $profile->image    = $finalPathName;
                    $profile->users_id = $userId;
                    $profile->save();

                }
            }
      
            return redirect('admin/profile')->with('success', 'User updated successfully');

        } catch (\Exception $e) {
            return redirect('admin/profile')->with('error', 'Error, user not updated'.$e);
        }
     }

}
