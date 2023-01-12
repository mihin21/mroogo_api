<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|integer|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password'

        ]);

        $userEmailExist = User::where('email', $request->email)->exists();
        $userPhoneExist = User::where('phone', $request->phone)->exists();
        if ($userEmailExist) {
            return response()->json(["error", "Désolé, Ce email exist déjà"], 400);
        } elseif ($userPhoneExist) {
            return response()->json(["error", "Désolé, Ce Numéro de téléphone est déjà utilisé"], 400);
        }

        if ($validator->fails()) {
            return response()->json([ "error', 'erreur lors de l'enregistrement."], 400);
        }
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'role_id' => 3,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $success['firstname'] =  $user->firstname;
        $success['lastname'] =  $user->lastname;
        return response()->json([$success, 'Enregistrement effectué avec succès.'], 200);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => "required|integer",
            'password' => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "error', 'La connexion a échoué."], 400);
        }

        if (!Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return response()->json(['error' => "Numero de téléphone ou mot de passe incorrect!"], 401);
        } else if ((int) Auth::user()->role_id !== 3) {
            return response()->json(['error' => "Accès non autorisé!"], 401);
        } 

        $token = Auth::user()->createToken('auth_token');
        return response()->json([
            'auth_token' => $token->plainTextToken,
            'user' => Auth::user()
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => "Deconnexion effectuée avec succès"
        ], 200);
    }

    public function updateData(Request $request)
    { {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'phone' => 'required|integer',
                'email' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "error', 'Erreur lors du changement d'information."
                ], 200);
            }

            if (empty($request->lastname) || empty($request->firstname) || empty($request->phone) || empty($request->email)) {
                return response()->json(['error' => 'Veuillez renseigner tous les champs'], 400);
            } elseif ($validator->fails()) {
                return response()->json([
                    "error', 'Erreur lors du changement d'information."
                ], 200);
            } else {
                Auth::user()->update([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'phone' => $request->phone,
                    'email' => $request->email,
                ]);
                return response()->json(['success' => "Vos informations ont été modifiées avec succés"], 200);
            }
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required |string',
            'confirm_password' => 'required|same:password|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => "erreur lors de l'enregistrement."]);
        } elseif ($request->password != $request->confirm_password) {
            return response()->json(['error' => 'Les mots de passe saisis ne correspondent pas !!!'], 400);
        } else {
            Auth::user()->update([
                'password' => Hash::make($request->password),
                'updated_at' => Auth::user()->updated_at
            ]);
            return response()->json(['success' => 'Mot de passe  changé avec succès. Vous pouvez désormais vous connecter avec votre nouveau mot de passe'], 200);
        }
    }
}
