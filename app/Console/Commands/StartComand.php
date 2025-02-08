<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Стартовая команда,при первом запуске на сервер,создает категории,теги и посты по умолчанию';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
