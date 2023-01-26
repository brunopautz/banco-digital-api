<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $table = 'movements';

    protected $fillable = [
        'account_id',
        'value',
        'type',
        'created_at',
        'update_at'
    ];
}
