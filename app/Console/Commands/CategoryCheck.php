<?php

namespace App\Console\Commands;

use App\Model\Categories;
use App\Model\Notifications;
use Illuminate\Console\Command;

class CategoryCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
        $categories = Categories::all();

        foreach ($categories as $categorie) {
            if ($categorie->movies->isEmpty()){

                $notification = new Notifications();
                $notification->categorie = $categorie->toArray();
                $notification->message = "La catégorie $categorie->title est vide";
                $notification->criticity = "warning";
                $notification->save();



            }
        }

    }
}
