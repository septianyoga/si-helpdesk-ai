<?php

namespace App\Console\Commands;

use App\Models\Divisi;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateTiket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:uptiket';

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
        // Divisi::create([
        //     'nama_divisi'   => 'hehe'
        // ]);
        Log::info("tol");
        return 0;
    }
}
