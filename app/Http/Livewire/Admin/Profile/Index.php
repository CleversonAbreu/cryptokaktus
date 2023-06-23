<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public $userId;
    public $uploadPath;

    public function __construct()
    {
        $this->uploadPath  = Config::get('constants.UPLOAD_PATH');
    }
    public function deleteProfile($userId)
    {
        $this->userId = $userId;
    }
    public function destroyProfile()
    {
        $user    = User::where('id', $this->userId)->first();
        $profile = Profile::where('users_id', $this->userId)->first();
        if ($profile) {
            $path = $this->uploadPath.$profile->image;
        }
            
        try {
            if($profile){
                if (File::exists($path)) {
                    File::delete($path);
                }
                $profile->delete();
            }
        
            $user->delete();
            
            return redirect('/login')->with('success', 'Your account has been deleted.');

        } catch (\Exception $e) {
            session()->flash('error', 'User deleted error');
        }

    }
    public function render()
    {
        $profile = Profile::where('users_id', Auth::user()->id)->first();
        return view('livewire.admin.profile.index', ['profile' => $profile]);
    }
}
