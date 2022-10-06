<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Ramos;
use App\Http\Resources\RamosResource;
use App\Http\Resources\RamosCollection;

class RamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return RamosCollection
     */
    public function index(Request $request)
    {
        return new RamosCollection(Ramos::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RamosResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $ramos = Ramos::create($requestData);
        return (new RamosResource($ramos))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Ramos $ramos
     * @return RamosResource
     */
    public function show(Ramos $ramos)
    {
        return new RamosResource($ramos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ramos $ramos
     * @return RamosResource
     */
    public function update(Request $request, Ramos $ramos)
    {
        $requestData = $request->all();
        $ramos->update($requestData);
        return (new RamosResource($ramos))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ramos $ramos
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Ramos $ramos)
    {
        $ramos->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
