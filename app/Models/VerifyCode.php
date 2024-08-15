<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyCode extends Model
{
    protected $table = "verify_code_email";
    protected $fillable = ['email', 'verify_code'];
}
