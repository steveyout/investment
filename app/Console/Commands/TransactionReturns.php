<?php

namespace App\Console\Commands;

use App\Models\Transaction;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TransactionReturns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TransactionReturns:transactionreturns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the transactions activated after 30 days';

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

        $today = Carbon::now(new \DateTimeZone('Africa/Lagos'));


        Transaction::whereRaw('status_date >= SUBDATE( NOW(), INTERVAL 27 DAY)')->where('status',  'ACTIVATED')->where('registras_plan',  'Starter Plan')->update(['rate' => DB::raw('rate + 0.01116'),  'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'), 'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::whereRaw('status_date >= SUBDATE( NOW(), INTERVAL 27 DAY)')->where('status',  'ACTIVATED')->where('registras_plan',  'Basic Plan')->update(['rate' => DB::raw('rate + 0.01116'),  'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'), 'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::whereRaw('status_date >= SUBDATE( NOW(), INTERVAL 27 DAY)')->where('status',  'ACTIVATED')->where('registras_plan',  'StartUp Plan')->update(['rate' => DB::raw('rate + 0.0149'),  'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'),  'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::whereRaw('status_date >= SUBDATE( NOW(), INTERVAL 27 DAY)')->where('status',  'ACTIVATED')->where('registras_plan',  'Standard Plan')->update(['rate' => DB::raw('rate + 0.0186'),  'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'),  'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::whereRaw('status_date >= SUBDATE( NOW(), INTERVAL 27 DAY)')->where('status',  'ACTIVATED')->where('registras_plan',  'Premium Plan')->update(['rate' => DB::raw('rate + 0.0223'), 'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'),  'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::whereRaw('status_date >= SUBDATE( NOW(), INTERVAL 27 DAY)')->where('status', 'ACTIVATED')->where('registras_plan',  'Platinum Plan')->update(['rate' => DB::raw('rate + 0.02604'), 'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'),  'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::where('status',  'ACTIVATED')->where('status_date' ,'<=' , Carbon::now()->subDays(6))->update(['achieved' => 'Yes', 'day_count' => 7]);






        Transaction::where('withdrawn',  'NO')->where('status',  'ACTIVATED')->where('returns', '!=', 0)->where('day_count', '>=', 7)->update(['returns' => DB::raw('returns')]);

        Transaction::where('withdrawn',  'YES')->where('status',  'ACTIVATED')->where('returns', '!=', 0)->where('day_count', '>=', 7)->update(['returns' => DB::raw('balance + (initial_returns - another_returns)')]);


        Transaction::where('withdrawn',  'YES')->where('status',  'ACTIVATED')->where('returns', '==', 0)->where('day_count', '>=', 7)->update(['returns' => DB::raw('initial_returns - another_returns')]);



        return $this->info('Achieved');


    }


}
