<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogAcesso extends Model
{
    protected $table = 'logs_acessos';

    use HasFactory;

    protected $fillable = [
        'token',
        'status',
        'ip_address',
    ];
}
