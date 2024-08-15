<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetCodePassword extends Model
{
    protected $table = "reset_code_passwords";
    protected $fillable = ['email', 'updated_at'];
}
