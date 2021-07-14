<?php

namespace App\Observers;

use App\FichaTecnica;
use App\Notifications\FichaTecnicaNotification;
use App\User;

class FichaTecnicaObserver
{
    /**
     * Handle the ficha tecnica "created" event.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return void
     */
    public function created(FichaTecnica $fichaTecnica)
    {
        $User=User::all();
        foreach ($User as $key => $value) {
           if ($value->hasARole(['administrador', 'Coordinador'])) {
                $value->notify(new FichaTecnicaNotification($fichaTecnica->id));
           }
        }
    }

    /**
     * Handle the ficha tecnica "updated" event.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return void
     */
    public function updated(FichaTecnica $fichaTecnica)
    {
        $User=User::all();
        foreach ($User as $key => $value) {
           if ($value->hasARole(['administrador', 'Coordinador'])&&$fichaTecnica->Estado=="Verificacion") {
                $value->notify(new FichaTecnicaNotification($fichaTecnica->id));
           }
        }
    }

    /**
     * Handle the ficha tecnica "deleted" event.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return void
     */
    public function deleted(FichaTecnica $fichaTecnica)
    {
        //
    }

    /**
     * Handle the ficha tecnica "restored" event.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return void
     */
    public function restored(FichaTecnica $fichaTecnica)
    {
        //
    }

    /**
     * Handle the ficha tecnica "force deleted" event.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return void
     */
    public function forceDeleted(FichaTecnica $fichaTecnica)
    {
        //
    }
}
