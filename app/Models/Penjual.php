<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'alamat',
        'phone'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
