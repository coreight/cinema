<?php

namespace App\Http\Controllers;

use App\Model\Recommandations;


/**
 * Class RecommandationsController
 * @package App\Http\Controllers
 */
class RecommandationsController extends Controller
{

    /**
     * Rafraichissement du bloc recommandations sur le dashboard via ajax
     */
    public function ajax()
    {
        $recommandation = new Recommandations();
        $recommandations = $recommandation->recommandations();

        $datas = [
            'recommandations' => $recommandations,
        ];

        return view('/Recommandations/ajax',$datas);

    }

}