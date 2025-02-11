<?php

namespace App\Http\Controllers;

use App\Models\User;

class CollectionController
{
    public function index()
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
                'age' => 12,
            ],
            [
                'name' => 'Ivan',
                'age' => 43,
            ],
            [
                'name' => 'Ivan',
                'age' => 20,
            ],
            [
                'name' => 'Elena',
                'age' => 20,
            ],
            [
                'name' => 'Elena',
                'age' => 21,
            ],
            [
                'name' => 'Elena',
                'age' => 22,
            ],
        ]);

        $dataColection = collect([
            [1,2,3],
            [4,5,6],
            [7,8,9],
        ]);

        $nameCollection = collect(['Boris', 'Ivan', 'Kate']);
        $anotherNameCollection = collect(['Ann', 'John']);
        $user = User::query()->limit(10)->get();

//dd($user->chunk(4));

        $result = $assocWorkerCollection->join(',');
        dd($result);

    }
}
