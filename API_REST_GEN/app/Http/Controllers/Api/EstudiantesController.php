<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Estudiantes;
use App\Http\Resources\EstudiantesResource;
use App\Http\Resources\EstudiantesCollection;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return EstudiantesCollection
     */
    public function index(Request $request)
    {
        return new EstudiantesCollection(Estudiantes::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return EstudiantesResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $estudiantes = Estudiantes::create($requestData);
        return (new EstudiantesResource($estudiantes))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Estudiantes $estudiantes
     * @return EstudiantesResource
     */
    public function show(Estudiantes $estudiantes)
    {
        return new EstudiantesResource($estudiantes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Estudiantes $estudiantes
     * @return EstudiantesResource
     */
    public function update(Request $request, Estudiantes $estudiantes)
    {
        $requestData = $request->all();
        $estudiantes->update($requestData);
        return (new EstudiantesResource($estudiantes))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Estudiantes $estudiantes
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Estudiantes $estudiantes)
    {
        $estudiantes->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
