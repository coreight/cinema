<?php

namespace App\Console\Commands;

use App\Model\Categories;
use App\Model\Notifications;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CategoryCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:check {confirm=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Affiche des notifications pour les catégories sans aucun film.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $confirm = $this->argument('confirm');

        // Vérification des catégories sans film
        $categories = Categories::all();

//        if ( $confirm == "false" ) {

//            if ($this->confirm('Voulez vous continuer ? [Y|N]')){
                // Supprime les anciennes notifications
            DB::connection('mongodb')->collection('notifications')->delete();

                // Ajoute des notifications pour les catégories vides
                foreach ($categories as $categorie) {
                    if ($categorie->movies->isEmpty()) {

                        $notification = new Notifications();
                        $notification->categorie = $categorie->toArray();
                        $notification->message = "La catégorie $categorie->title est vide";
                        $notification->criticity = "warning";
                        $notification->save();
                    }
//                }
//            }

        }





    }

}
