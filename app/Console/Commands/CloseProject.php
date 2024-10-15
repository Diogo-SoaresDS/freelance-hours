<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Container\Attributes\Log;
use App\Models\Project;

class CloseProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:close-project';

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
        Project::query()
            ->where('ends_at', '<=', now())
            ->update(['status' => 'closed']);

        Log::info('Rodou o comando!');
    }
}