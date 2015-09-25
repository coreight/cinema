<?php

namespace App\Console\Commands;

use App\Model\Movies;
use App\Model\Notifications;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MovieInvisible extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:invisible';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Affiche des notifications pour les films invisibles.';

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
        $movies = Movies::all();

        DB::connection('mongodb')->collection('notifications')->delete();

        foreach ($movies as $movie) {
            if ($movie->visible == 0) {

                $notification = new Notifications();
                $notification->movie = $movie->toArray();
                $notification->message = "Le film $movie->title n'est pas visible";
                $notification->criticity = "info";
                $notification->save();
            }
        }

    }
}
