<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemovalPublication extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','remove_types_id','service_id','exit_town','exit_quarter','arrival_town','arrival_quarter','phone',];
}
