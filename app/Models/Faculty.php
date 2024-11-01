<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
