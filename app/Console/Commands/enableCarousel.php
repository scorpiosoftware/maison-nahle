<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class enableCarousel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'carousel:enable';

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
        $carousel = \App\Models\Carousel::first();
        
        if ($carousel) {
            $carousel->is_enable = true;
            $carousel->save();
            $this->info('Carousel has been enabled.');
        } else {
            $this->error('No carousel found to enable.');
        }
    }
}
