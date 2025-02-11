<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RunCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RunCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Консольная команда для отработки знаний по колекциям';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $numberCollection = collect([1,2,3,4,5,6,7,8,9,10]);

        $anotherNumberCollection = collect([10,20,33,42,53,60,72,80,91,100]);

        $assocWorkerCollection = collect([
            [
                'name' => 'Boris',
                'age' => 20,
            ],
            [
                'name' => 'Ivan',
                'age' => 20,
            ],
            [
                'name' => 'Elena',
                'age' => 20,
            ],
        ]);

$nameCollection = collect(['Boris', 'Ivan', 'Kate']);
$anotherNameCollection = collect(['Ann', 'John']);
$user = User::query()->limit(10)->get();

//dd($user->chunk(4));

$result = $anotherNumberCollection->chunkWhile
(function ($value, $key, $collection) {
 return $value % 10 === 0;
});

dd($result);










    }
}
