<?php namespace AlbrightLabs\Client\Controllers;

use Backend;
use Redirect;
use BackendMenu;
use AlbrightLabs\Client\Models\Client;
use AlbrightLabs\Client\Models\Settings;
use Backend\Classes\Controller;

/**
 * Clients Back-end Controller
 */
class Clients extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ImportExportController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $importExportConfig = 'config_import_export.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
        $this->bodyClass = 'compact-container';
        BackendMenu::setContext('AlbrightLabs.Client', 'client', 'clients');
    }

    /**
     * Redirect after create if needed
     */
    public function create_onSave($context = null)
    {
        // save as normal
        parent::create_onSave($context);

        // redirect to intended url
        $lastClient = Client::orderBy('id', 'desc')->first();
        if(isset($_GET['redirect'])){
            return Redirect::to($_GET['redirect'].'/'.$lastClient->id);
        }else{
            return Backend::redirect('albrightlabs/client/clients/preview/'.$lastClient->id);
        }
    }

    /**
     * Reset import view container
     */
    public function import()
    {
        $this->bodyClass = 'stretch-container';
        $this->asExtension('ImportExportController')->import();
    }

    /**
     * Reset export view container
     */
    public function export()
    {
        $this->bodyClass = 'stretch-container';
        $this->asExtension('ImportExportController')->export();
    }

    /**
     * Delete method from preview context
     */
    public function preview_onDelete($recordId = null)
    {
        return $this->asExtension('FormController')->update_onDelete($recordId);
    }

    /**
     * Extend form fields
     */
    public function formExtendFields($form)
    {
        // Add custom fields to form if provided
        if($customfields = Settings::get('custom_fields')){
            foreach($customfields as $customField){
                $form->addTabFields([
                  'customFields['.$customField["slug"].']' => [
                    'label' => $customField['title'],
                    'type'  => $customField['type'],
                    'span'  => $customField['span'],
                    'tab'   => 'Custom fields',
                  ],
                ]);
            }
        }
    }
}
