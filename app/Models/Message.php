<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $fillable=['name','message','email','phone','read_at','photo','subject'];
}
