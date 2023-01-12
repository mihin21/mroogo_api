<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePublication extends Model
{
    use HasFactory;
    protected $fillable = ['title','area','city_id', 'quarter','user_id','service_id','estate_id','phone','description','price','picture1','picture2','picture3'] ;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function estate(){
        return $this->belongsTo(Estate::class);
    }
}
