<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\PROFESORES;
use App\Http\Resources\PROFESORESResource;
use App\Http\Resources\PROFESORESCollection;

class PROFESORESController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return PROFESORESCollection
     */
    public function index(Request $request)
    {
        return new PROFESORESCollection(PROFESORES::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PROFESORESResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $pROFESORES = PROFESORES::create($requestData);
        return (new PROFESORESResource($pROFESORES))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param PROFESORES $pROFESORES
     * @return PROFESORESResource
     */
    public function show(PROFESORES $pROFESORES)
    {
        return new PROFESORESResource($pROFESORES);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PROFESORES $pROFESORES
     * @return PROFESORESResource
     */
    public function update(Request $request, PROFESORES $pROFESORES)
    {
        $requestData = $request->all();
        $pROFESORES->update($requestData);
        return (new PROFESORESResource($pROFESORES))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PROFESORES $pROFESORES
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(PROFESORES $pROFESORES)
    {
        $pROFESORES->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
