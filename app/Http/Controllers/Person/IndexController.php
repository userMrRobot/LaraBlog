<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Resources\Person\PersonResource;
use App\Models\Person;

class IndexController extends Controller
{
    public function __invoke()
    {
        $person = Person::all();

//        return 111111;
        return response(PersonResource::collection($person), 200);
    }
}
