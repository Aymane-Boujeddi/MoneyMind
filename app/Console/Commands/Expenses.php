<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Depense;
use Illuminate\Support\Facades\Log;

class Expenses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expenses';

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
        //
        $today = Carbon::today()->day;
        $depenses = Depense::where('type','recurente')->with('user')->get();
        
        foreach($depenses as $depense){
            $depense_date =  Carbon::parse($depense->start_date);
            $day = $depense_date->day;
            Log::info($depense->user->budget);
            if($today === $day){
                $depense->user->budget -= $depense->amount;
                $depense->user->save();
                $this->info("Monthly Expense {$depense->title} for {$depense->user->name}");
            }


        }
    }
}
