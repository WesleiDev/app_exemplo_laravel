<?php

namespace App\Http\Controllers;

use App\Http\Resources\InteressadoResource;
use App\Models\Interessado;
use Illuminate\Http\Request;

class InteressadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        try{
            return InteressadoResource::collection(Interessado::paginate());
        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao consultar interessados: '.$e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
           // dd($data);

            foreach ($data as $interessado ){
                Interessado::create($interessado);
            }

            return response()->json([
                'erro' => false,
                'data' => 'Interessados adicionados com sucesso!'
            ]);
        }catch(\Exception $e){
            return response()->json([
               'erro'  => true,
                'data' => 'Erro ao cadastrar Interessado: '.$e->getMessage()
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try{

            $interessado = Interessado::findOrFail($id);
            $interessado->bolo;

            return response()->json([
                'erro' => false,
                'data' => $interessado
            ]);
        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao consultar interessado: '.$e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $request->all();
            $interessado = Interessado::findOrFail($id);
            $interessado->update($data);

            return response()->json([
                'erro' => false,
                'data' => $interessado
            ]);
        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao atualizar interessado: '.$e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            $interessado = Interessado::findOrFail($id);
            $interessado->delete();
            return response()->json([
                'erro' => false,
                'data' => 'Interessado excluido com sucesso!'
            ]);

        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao excluir Interessado: '.$e->getMessage()
            ], 500);
        }
    }
}
