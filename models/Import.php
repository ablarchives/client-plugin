<?php namespace AlbrightLabs\Client\Models;

use AlbrightLabs\Client\Models\Client;

class Import extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {

            $existing = Client::where('email', strtolower($data['email']))->first();
            if(null !== $existing){
                continue;
            }

            try {
                $client = new Client;
                $client->fill($data);
                $client->save();

                $this->logCreated();
            }
            catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }
    }
}
