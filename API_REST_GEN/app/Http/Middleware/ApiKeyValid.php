<?php

namespace App\Http\Middleware;
use App\Models\api_Key;
use Closure;

class ApiKeyValid
{
  public function handle($request, Closure $next)
  {
    if (!$request->has("api_key")) {
      return response()->json([
        'status' => 401,
        'message' => 'Acceso no autorizado; Key',
      ], 401);
    }

    if ($request->has("api_key")) {
      $inp = $request->input("api_key");
      $user = api_Key::where('key', '=', $inp)->first();
      if ($user === null) {
        return response()->json([
          'status' => 404,
          'message' => 'API-Key no existente en la BD',
        ], 404);
      }
        return $next($request);
      }
    }
  }
