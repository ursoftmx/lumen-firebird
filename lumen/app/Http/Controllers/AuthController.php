<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function generateToken(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'client_secret' => 'required',
        ]);

        $user = User::where(['id' => $request->client_id, 'secret' => $request->client_secret])->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Generar un token único
        $token = Str::random(60);

        // Establecer la fecha de expiración
        $expiresAt = Carbon::now()->addHours(1);

        // Guardar el token y la fecha de expiración en el usuario
        $user->token = $token;
        $user->expires_at = $expiresAt;
        $user->save();

        return response()->json([
            "token_type"=> "bearer",
            'token' => $token,
            'expires_in' => $expiresAt->timestamp,
        ]);
    }
}
