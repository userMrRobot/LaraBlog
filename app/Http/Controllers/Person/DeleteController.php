<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;

class DeleteController extends Controller
{
    public function __invoke(Person $person)
    {


        $person->delete();
        return response([]);
    }
}
