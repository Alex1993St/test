<?php

namespace App\Services;

use App\Jobs\ParsQueue;
use Carbon\Carbon;

class Account
{
    public static function processPayment($data)
    {
        $data['date_time'] = Carbon::now()->format('d:m:Y H:i:s');
        ParsQueue::dispatch($data);
    }
}
