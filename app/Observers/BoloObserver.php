<?php

namespace App\Observers;

use App\Jobs\AvisoInteressado;
use App\Models\Bolo;
use App\Models\Interessado;

class BoloObserver
{

    /**
     * Handle the Bolo "updated" event.
     *
     * @param  \App\Models\Bolo  $bolo
     * @return void
     */
    public function updating(Bolo $bolo)
    {

        $quantidadeAntiga = $bolo->getOriginal('quantidade');

        //Se quantidade antiga for ZERO e anova quantidade for maior que ZERO envia o email para todos que estão aguardando
        if($quantidadeAntiga == 0 && $bolo->quantidade > 0){
            //Consulta somente os enteressados que não tiveram os emails enviados
            $interessados = $bolo->interessado()
                                 ->where('email_enviado', false)
                                 ->get();

            foreach($interessados as $interessado){
                //Envia o email ao interessado
                AvisoInteressado::dispatch(Interessado::find($interessado->id));
            }
        }
    }


}
