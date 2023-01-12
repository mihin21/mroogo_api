<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalPublication extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','city_id','caution_month_id','type_id','salon_id','service_id','estate_id','title','area','quarter','price','phone','number_of_chamber','intern_toilet_number','extern_toilet','water','electricitie','plafond','carreaux','garage','magasin','description','picture1','picture2','picture3',
    ];
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
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function caution_month(){
        return $this->belongsTo(CautionMonth::class);
    }
    public function salon(){
        return $this->belongsTo(Salon ::class);
    }
}
