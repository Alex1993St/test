<?php

namespace App\Traits;

use App\Services\Account;
use App\Services\Amocrm;

trait DataTrait
{
    public function getFile()
    {
        return json_decode(file_get_contents(base_path() . '/data/tasks.json'), true);
    }

    public function nCount()
    {
        return config("app.n_count");
    }

    public function getCycleCount()
    {
        $n_count = $this->nCount();
        $size = $this->sizeOf($this->getFile());
        return $size < $n_count ? $size : $n_count;
    }

    public function sizeOf($data)
    {
        return sizeof($data);
    }

    public function startParser()
    {
        $json = $this->getFile();
        $count = $this->getCycleCount();

        for ( $i = 0; $i < $count; $i++ ) {
            switch ( $json[$i]['category'] ) {
                case 'account': Account::processPayment($json[$i]['data']);
                    break;
                case 'amocrm': Amocrm::sendLead($json[$i]['data']);
                    break;
            }
        }
    }
}
