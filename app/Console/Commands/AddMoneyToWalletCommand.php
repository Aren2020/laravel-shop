<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddMoneyToWalletCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:money';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        User::all()->each(function ($user) {
            $user->update(['wallet' => $user->wallet + 100]);
        });
    }
}
