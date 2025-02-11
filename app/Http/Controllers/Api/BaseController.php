<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\ApiUser\UserService;

class BaseController extends Controller
{
public $service;

    /**
     * @param $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

}
