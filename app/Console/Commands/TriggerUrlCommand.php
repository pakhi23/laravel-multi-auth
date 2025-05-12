<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Http;

class TriggerUrlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'url:trigger';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'trigger url';

    /**
     * Execute the console command.
     */
public function handle()
{
    $url ='https://youtube.com';

    if (!$url) {
        $this->error('No URL provided.');
        return 1;
    }

    $this->info("Triggering: $url");

    try {
        $response = Http::timeout(20)->get($url); // timeout me 20 second ka wait krega .. agar url slow hua hua to dead hua to  stuck rhega

        if ($response->successful()) {
            $this->info("Success: {$response->status()}");
            return 0;
        }

        $this->error("Failed with status: {$response->status()}");
    } catch (\Exception $e) {
        $this->error("Error: {$e->getMessage()}");
    }

    return 1;
}
}
