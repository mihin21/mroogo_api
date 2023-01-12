<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoRentalPublicationResource;
use App\Http\Resources\MyProfilRentalResource;
use App\Models\CoRentalPublication;
use App\Models\MyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CoRentalController extends Controller
{
    public function getcoRentalPublicationUserConnected()
    {
        $coRentalForUserConnected = MyProfile::where('user_id', Auth::user()->id)->get();
        return MyProfilRentalResource::collection($coRentalForUserConnected);
    }

    public function getcoRentalPublication()
    {
        $coRental = CoRentalPublication::all();
        return CoRentalPublicationResource::collection($coRental);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quarter' => 'required|string',
            'city' => 'required|string',
            'number_of_chamber' => 'required|integer',
            'toilet_number' => 'required|integer',
            'price' => 'required|integer',
            'age' => 'required|integer',
            'description' => 'required|string',
            'phone1' => 'required|integer',
            'phone2' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "error', 'erreur lors de l'enregistrement."
            ], 401);
        }
        $data = MyProfile::create([
            'user_id' => Auth::user()->id,
            'sexe_id' => $request->sexe_id,
            'service_id' => 4,
            'price' => $request->price,
            'age' => $request->age,
            'description' => $request->description,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2
        ]);
        CoRentalPublication::create([
            'quarter' => $request->quarter,
            'city' => $request->city,
            'number_of_chamber' => $request->number_of_chamber,
            'toilet_number' => $request->toilet_number,
            'type_id' => $request->type_id,
            'preference_id' => $request->preference_id,
            'my_profile_id' => $data->id,
        ]);
        return response()->json([
            'success', 'Enregistrement efféctué avec succès.'
        ], 200);
    }

    public function delete($id){
        $deleteCoRental = CoRentalPublication::find($id);
        $deleteCoRental->delete();
        return response()->json([
            'success' , 'suppression effectué avec succès'
        ]);
    }
}
