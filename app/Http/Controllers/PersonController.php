<?php

namespace App\Http\Controllers;

class PersonController
{
    public function index()
    {
        $persons = [
            [
                'name' => 'John Doe',
                'age' => 32,
                'job' => 'Web Developer'
            ],[
                'name' => 'Suzanna',
                'age' => 34,
                'job' => 'Web Developer'
            ], [
                'name' => 'Nikich',
                'age' => 22,
                'job' => 'Web Developer'
            ],
        ];
        return $persons;
    }
}
