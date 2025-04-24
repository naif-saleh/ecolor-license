<?php

namespace App\Console\Commands;

use App\Models\Licen;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateLicenseExpairedStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-license-expaired-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Update Licesne Command Start in '.now());
        $timeZone = config('app.timezone');
        $now = now()->timezone($timeZone);
        $licenses = Licen::all();

        foreach($licenses as $license){
            $start_date = $license->start_date;
            $end_date = $license->end_date;

            //parse start_date & end_date
            // Carbon::parse(date('Y-m-d'). ' '.$start_date)->timezone($timeZone);
            // Carbon::parse(date('Y-m-d').' '.$end_date)->timezone($timeZone);

            //check if start_date & end_date are between valid date
            if(!$now->between($start_date,$end_date)){
                $license->update([
                    'status' => 'Expired'
                ]);
                Log::info('License of '. $license->company->name . ' is Expaired');
            }

        }

    }
}
