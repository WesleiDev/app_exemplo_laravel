<?php

namespace App\Jobs;

use App\Mail\AvisoInressado;
use App\Models\Interessado;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AvisoInteressado implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;

    private $interessado;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Interessado $interessado)
    {
        $this->interessado = $interessado;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new AvisoInressado($this->interessado));
        Log::info('ENVIANDO EMAIL PARA '.$this->interessado->email);
        //Marca o email como enviado
        DB::table('interessados')
            ->where('id', $this->interessado->id)
            ->update(['email_enviado' => true]);
    }
}
