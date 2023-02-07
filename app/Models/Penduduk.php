<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(){
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }

}
