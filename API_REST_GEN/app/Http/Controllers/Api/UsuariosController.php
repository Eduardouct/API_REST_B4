<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Http\Resources\UsuariosResource;
use App\Http\Resources\UsuariosCollection;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return UsuariosCollection
     */
    public function index(Request $request)
    {
        return new UsuariosCollection(Usuarios::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return UsuariosResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $usuarios = Usuarios::create($requestData);
        return (new UsuariosResource($usuarios))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Usuarios $usuarios
     * @return UsuariosResource
     */
    public function show(Usuarios $usuarios)
    {
        return new UsuariosResource($usuarios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Usuarios $usuarios
     * @return UsuariosResource
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        $requestData = $request->all();
        $usuarios->update($requestData);
        return (new UsuariosResource($usuarios))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Usuarios $usuarios
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Usuarios $usuarios)
    {
        $usuarios->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
