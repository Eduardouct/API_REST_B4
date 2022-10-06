<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\UsuarioCollection;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return UsuarioCollection
     */
    public function index(Request $request)
    {
        return new UsuarioCollection(Usuario::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return UsuarioResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $usuario = Usuario::create($requestData);
        return (new UsuarioResource($usuario))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Usuario $usuario
     * @return UsuarioResource
     */
    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Usuario $usuario
     * @return UsuarioResource
     */
    public function update(Request $request, Usuario $usuario)
    {
        $requestData = $request->all();
        $usuario->update($requestData);
        return (new UsuarioResource($usuario))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Usuario $usuario
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
