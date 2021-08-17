<?php

namespace App\Observers;

use App\Planta;
use App\User;
class HojaCampoObserver
{
    /**
     * Handle the planta "created" event.
     *
     * @param  \App\Planta  $planta
     * @return void
     */
    public function created(Planta $planta)
    {
        $User=User::all();
        foreach ($User as $key => $value) {
           if ($value->hasARole(['administrador', 'Coordinador'])) {
                $value->notify(new HojaCampoNotification($planta->id));
           }
        }
    }

    /**
     * Handle the planta "updated" event.
     *
     * @param  \App\Planta  $planta
     * @return void
     */
    public function updated(Planta $planta)
    {
        //
    }

    /**
     * Handle the planta "deleted" event.
     *
     * @param  \App\Planta  $planta
     * @return void
     */
    public function deleted(Planta $planta)
    {
        //
    }

    /**
     * Handle the planta "restored" event.
     *
     * @param  \App\Planta  $planta
     * @return void
     */
    public function restored(Planta $planta)
    {
        //
    }

    /**
     * Handle the planta "force deleted" event.
     *
     * @param  \App\Planta  $planta
     * @return void
     */
    public function forceDeleted(Planta $planta)
    {
        //
    }
}
