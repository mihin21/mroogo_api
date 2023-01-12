<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\rentalPublicationResource;
use App\Models\RentalPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RentalController extends Controller
{
    public function getRentalPublication()
    {
        $rental = RentalPublication::all();
        return rentalPublicationResource::collection($rental);
    }
    public function getRentalUserConnected(){
        $rentalForUserConnected = RentalPublication::where('user_id',Auth::user()->id)->get();
        return rentalPublicationResource::collection($rentalForUserConnected);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'area' => 'required|integer',
            'quarter' => 'required|string',
            'phone' => 'required|integer',
            'number_of_chamber' => 'required|integer',
            'intern_toilet_number' => 'required|integer',
            'extern_toilet' => 'boolean',
            'water' => 'boolean',
            'electricitie' => 'boolean',
            'plafond' => 'boolean',
            'carreaux' => 'boolean',
            'garage' => 'boolean',
            'magasin' => 'boolean',
            'description' => 'required|string',
            'price' => 'required|integer',
            'picture1' => 'required|image',
            'picture2' => 'image',
            'picture3' => 'image',
            
        ]);
        if ($validator->fails()) {
            return response()->json([
                "error', 'erreur lors de l'enregistrement."
            ], 401);
        }
        $picture1 = "";
        if ($request->hasFile('picture1')) {
            $picture1 = $request->file('picture1')->store('public/rentalPictures');
        }
        $picture2 = "";
        if ($request->hasFile('picture2')) {
            $picture2 = $request->file('picture2')->store('public/rentalPictures');
        }
        $picture3 = "";
        if ($request->hasFile('picture3')) {
            $picture3 = $request->file('picture3')->store('public/rentalPictures');
        }

        RentalPublication::create([
            'title' => $request->title,
            'area' => $request->area,
            'quarter' => $request->quarter,
            'price' => $request->price,
            'phone' => $request->phone,
            'description' => $request->description,
            'number_of_chamber' => $request->number_of_chamber,
            'intern_toilet_number' => $request->intern_toilet_number,
            'extern_toilet' => false,
            'water' => false,
            'plafond' => false,
            'carreaux' => false,
            'garage' => false,
            'magasin' => false,
            'electricitie' => false,
            'user_id' => Auth::user()->id,
            'city_id' => $request->city_id,
            'caution_month_id' => $request->caution_month_id,
            'type_id' => $request->type_id,
            'salon_id' => $request->salon_id,
            'service_id' => 2,
            'estate_id' => $request->estate_id,
            'picture1' => $picture1,
            'picture2' => $picture2,
            'picture3' => $picture3,
        ]);
        return response()->json([
            'success', 'Enregistrement efféctué avec succès.'
        ], 200);
    }
    public function delete($id){
        $deleteRentalPublication = RentalPublication::find($id);
        $deleteRentalPublication->delete();
        return response()->json([
            'success' , 'suppression effectué avec succès'
        ]);
    }

}
