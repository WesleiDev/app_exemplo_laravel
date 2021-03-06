<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoloRequest;
use App\Http\Resources\BoloResource;
use App\Models\Bolo;
use Illuminate\Http\Request;

class BoloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        try{
            return BoloResource::collection(Bolo::paginate());
        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao consultar bolos: '.$e->getMessage()
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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(BoloRequest $request)
    {
        try{

            $data = $request->all();
            $bolo = Bolo::create($data);
            return response()->json([
                'erro' => false,
                'data' => $bolo
            ]);
        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao cadastrar bolo: '.$e->getMessage()
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

            $bolo = Bolo::findOrFail($id);
            $bolo->interessado;

            return response()->json([
                'erro' => false,
                'data' => $bolo
            ]);
        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao consultar bolo: '.$e->getMessage()
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BoloRequest $request, $id)
    {
        try{
            //TODO Implementar no Observer para quando atualizar o boleto verificar se tem quantidade e se tiver quantidade, enviar os emails
            $data = $request->all();

            $bolo = Bolo::find($id);
            $bolo->update($data);

            return response()->json([
                'erro' => false,
                'data' => $bolo
            ]);
        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao atualizar bolo: '.$e->getMessage()
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
            //TODO Implementar no Observer de Boloto para ao remover o bolo, remover todos os emails interessados
            $bolo = Bolo::findOrFail($id);
            $bolo->delete();
            return response()->json([
               'erro' => false,
               'data' => 'Bolo excluido com sucesso!'
            ]);

        }catch(\Exception $e){
            return response()->json([
                'erro' => true,
                'data' => 'Erro ao excluir bolo: '.$e->getMessage()
            ], 500);
        }
    }

}
