<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RemovalPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RemovePublicationController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'exit_town' => 'required|string',
            'exit_quarter' => 'required|string',
            'arrival_town' => 'required|string',
            'arrival_quarter' => 'required|string',
            'phone' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(["error', 'erreur lors de l'enregistrement."], 401);
        }

        RemovalPublication::create([
            'exit_town' => $request->exit_town,
            'exit_quarter' => $request->exit_quarter,
            'arrival_town' => $request->arrival_town,
            'arrival_quarter' => $request->arrival_quarter,
            'phone' => $request->phone,
            'user_id' => Auth::user()->id,
            'remove_types_id' => $request->remove_types_id,
            'service_id' => 3
        ]);
        return response()->json([
            'success', 'Enregistrement efféctué avec succès.'
        ], 200);
    }
    public function delete($id){
        $deleteRemovalPublication = RemovalPublication::find($id);
        $deleteRemovalPublication->delete();
        return response()->json([
            'success' , 'suppression effectué avec succès'
        ]);
    }
}
