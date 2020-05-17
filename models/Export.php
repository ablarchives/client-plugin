<?php namespace AlbrightLabs\Client\Models;

use AlbrightLabs\Client\Models\Client;

class Export extends \Backend\Models\ExportModel
{
    public function exportData($columns, $sessionKey = null)
    {
        $clients = Client::all();
        $clients->each(function($client) use ($columns) {
            $client->addVisible($columns);
        });
        return $clients->toArray();
    }
}
