<?php

namespace App\Http\Controllers;

use App\Traits\DataTrait;

class ParsController extends Controller
{
    use DataTrait;

    public function parser()
    {
        $this->startParser();
    }
}
