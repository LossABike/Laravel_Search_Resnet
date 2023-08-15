<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    protected $table = 'reset_password';
    protected $primaryKey ='id';
    // mass assignbale
    protected $guarded = [];
    protected $fillable = [
        'email',
        'created_at',
        'token',
    ];

    
}
