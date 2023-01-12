<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyProfile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','service_id','sexe_id','price','age','description','phone1','phone2'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sexe(){
        return $this->belongsTo(Sexe::class);
    }
}
