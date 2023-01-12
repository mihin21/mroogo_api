<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoRentalPublication extends Model
{
    use HasFactory;
    protected $fillable = ['type_id','preference_id','my_profile_id','city','quarter','number_of_chamber','toilet_number',];
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function preference(){
        return $this->belongsTo(Preference::class);
    }
    public function my_profile(){
        return $this->belongsTo(MyProfile::class);
    }
}
