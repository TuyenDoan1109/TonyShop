<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function resetSessionSearch() {
        $currentRouteName = \Request::route()->getName();
        $url = url()->previous();
        $previousRoute = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();

        if ($previousRoute != $currentRouteName) {
            session()->forget('key_search');
        }
    }
}
