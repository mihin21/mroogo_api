<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['citie_name'];
    
    public function salePublication(){
        return $this->hasOne(salePublication::class);
    }
}
