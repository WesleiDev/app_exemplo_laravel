<?php

namespace App\Observers;

use App\Jobs\AvisoInteressado;
use App\Models\Interessado;

class InteressadoObserver
{

    /**
     * Handle the Interessado "creating" event.
     *
     * @param  \App\Models\Interessado  $interessado
     * @return void
     */
    public function creating(Interessado $interessado)
    {
        $exiteInteressado = Interessado::where('email_enviado', false)
                                        ->where('email', $interessado->email)
                                        ->where('bolo_id', $interessado->bolo_id)
                                        ->get();

        if($exiteInteressado->count()){
            throw new \Exception("Esse email ($interessado->email) já está cadastrado para esse bolo informado!");
        }
    }

    /**
     * Handle the Interessado "created" event.
     *
     * @param  \App\Models\Interessado  $interessado
     * @return void
     */
    public function created(Interessado $interessado)
    {
       $bolo = $interessado->bolo;

       //Se tiver quantidade no bolo, envia o email avisando o cliente
       if($bolo->quantidade > 0){
           AvisoInteressado::dispatch($interessado);
       }
    }





}
