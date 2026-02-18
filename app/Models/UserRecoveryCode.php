<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRecoveryCode extends Model
{
    
    public function recoveryCodes()  
    {

        return $this->belongsTo(User::class);
    }
}
