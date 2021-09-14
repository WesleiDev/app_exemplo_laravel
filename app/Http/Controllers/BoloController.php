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
                'error' => true,
                'message' => 'Erro ao consultar bolos: '.$e->getMessage()
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
                'error' => false,
                'data' => $bolo
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => true,
                'message' => 'Erro ao cadastrar bolo: '.$e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
