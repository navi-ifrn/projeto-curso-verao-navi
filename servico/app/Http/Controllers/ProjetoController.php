<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Projeto::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'titulo' => 'required',
            'descricao' => 'sometimes',
            'gerente_id' => 'required|exists:users,id'
        ]);

        $projeto = Projeto::create($data);

        return response()->json($projeto);
    }

    /**
     * Display the specified resource.
     *
     * @param Projeto $projeto
     * @return JsonResponse
     */
    public function show(Projeto $projeto)
    {
        return response()->json($projeto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Projeto $projeto
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, Projeto $projeto)
    {
        $data = $this->validate($request, [
            'titulo' => 'sometimes',
            'descricao' => 'sometimes',
            'gerente_id' => 'sometimes|exists:users,id'
        ]);

        $projeto->update($data);

        return response()->json($projeto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Projeto $projeto
     * @return Response
     */
    public function destroy(Projeto $projeto)
    {
        //
    }

    /**
     * @param Projeto $projeto
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function associarUsuario(Projeto $projeto, Request $request)
    {
        $data = $this->validate($request, [
            'usuario_id' => 'required|exists:users,id',
            'papel_id' => 'required|exists:papeis,id'
        ]);

        $projeto->pesquisadores()->attach($data['usuario_id'], [
            'papel_id' => $data['papel_id']
        ]);

        $projeto->load('pesquisadores');

        return response()->json($projeto);
    }
}
