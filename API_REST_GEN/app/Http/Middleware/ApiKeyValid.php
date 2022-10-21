<?php

namespace App\Http\Middleware;
use App\Models\api_Key;
use Closure;

class ApiKeyValid
{
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (!$request->has("api_key")) {
      return response()->json([
        'status' => 401,
        'message' => 'Acceso no autorizado',
      ], 401);
    }

    if ($request->has("api_key")) {
      $inp = $request->input("api_key");
      $user = api_Key::where('key', '=', $inp)->first();
      if ($user === null) {
        return response()->json([
          'status' => 401,
          'message' => 'Acceso no autorizado',
        ], 401);
      }
    }

    return $next($request);
  }
}