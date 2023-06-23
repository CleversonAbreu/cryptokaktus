<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    use HasFactory;
    protected $table = 'cryptos';
    protected $fillable = [
        'name',
        'price',
        'creation_year',
        'location',
        'category'
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'users_id', 'id');
    }
}
