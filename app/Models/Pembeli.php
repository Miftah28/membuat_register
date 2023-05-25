<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'alamat',
        'phone'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
