<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\salePublicationResource;
use App\Models\SalePublication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function getSalePublication(){
        $sale = SalePublication::all();
        return salePublicationResource::collection($sale);
    }
    public function getSaleUserConnected(){
        $saleForUserConnected = SalePublication::where('user_id',Auth::user()->id)->get();
        return salePublicationResource::collection($saleForUserConnected);
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'area' => 'required|integer',
            'quarter' => 'required|string',
            'phone' => 'required|integer',
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
        if($request->hasFile('picture1')){
            $picture1 = $request->file('picture1')->store('public/salePictures');
        }
        $picture2 = "";
        if($request->hasFile('picture2')){
            $picture2 = $request->file('picture2')->store('public/salePictures');
        }
        $picture3 = "";
        if($request->hasFile('picture3')){
            $picture3 = $request->file('picture3')->store('public/salePictures');
        }
        
        SalePublication::create([
            'title' => $request->title,
            'area' => $request->area,
            'quarter' => $request->quarter,
            'price' => $request->price,
            'phone' => $request->phone,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'city_id' => $request->city_id,
            'service_id' => 1,
            'estate_id' => $request->estate_id,
            'picture1' => $picture1,
            'picture2' => $picture2,
            'picture3' => $picture3,
        ]);
        return response()->json(['success', 'Enregistrement efféctué avec succès.'
        ], 200);
       
    }
    public function delete($id){
        $deleteSalePublication = SalePublication::find($id);
        $deleteSalePublication->delete();
        return response()->json([
            'success' , 'suppression effectué avec succès'
        ]);
    }

}
