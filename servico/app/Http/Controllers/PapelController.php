<?php

namespace App\Http\Controllers;

use App\Models\Papel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Papel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'nome' => 'required'
        ]);

        $papel = Papel::create($data);

        return $papel;
    }

    /**
     * Display the specified resource.
     *
     * @param Papel $papel
     * @return JsonResponse
     */
    public function show(Papel $papel)
    {
        return response()->json($papel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Papel $papel
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, Papel $papel)
    {
        $data = $this->validate($request, [
            'nome' => 'required'
        ]);

        $papel->update($data);

        return response()->json($papel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Papel $papel
     * @return Response
     */
    public function destroy(Papel $papel)
    {
        //
    }
}
