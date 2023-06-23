<?php

namespace App\Http\Livewire\Admin\Crypto;

use App\Models\Crypto;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme ='bootstrap';
    public $search = '';

    public function updatingSearch()
    {
       $this->resetPage();
    }
    public function render()
    {   $cryptos = Crypto::where('name','like','%'.$this->search.'%')
        ->orWhere('location','like','%'.$this->search.'%')
        ->orWhere('category','like','%'.$this->search.'%')
        ->orderBy('id','ASC')->paginate(10);
        return view('livewire.admin.crypto.index', ['cryptos' => $cryptos]);
    }
}
