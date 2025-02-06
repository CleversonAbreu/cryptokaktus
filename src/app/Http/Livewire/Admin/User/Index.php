<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $userId;
    public $uploadPath;
    public function __construct()
    {
        $this->uploadPath  = Config::get('constants.UPLOAD_PATH');
    }
    public function deleteUser($userId)
    {
        $this->userId = $userId;
    }

    public function destroyUser()
    {
        $user    = User::where('id', $this->userId)->first();
        $profile = Profile::where('users_id', $this->userId)->first();
        if ($profile) {
            $path = $this->uploadPath.$profile->image;
        }

        try {
            if ($profile) {
                if (File::exists($path)) {
                    File::delete($path);
                }
                $profile->delete();
            }
           
            $user->delete();
            
            session()->flash('success', 'User deleted');
            $this->dispatchBrowserEvent('close-modal');

        } catch (\Exception $e) {
            session()->flash('error', 'User deleted error'.$e);
        }
    }

    public function render()
    {
        $users = User::whereRaw("users_id = ".Auth::user()->id." and id <> ".Auth::user()->id)
        ->orderBy('id', 'asc')->paginate(10);
        return view('livewire.admin.user.index', ['users'=>$users]);
    }
}
