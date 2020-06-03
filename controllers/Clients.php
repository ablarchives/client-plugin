<?php namespace AlbrightLabs\Client\Controllers;

use BackendMenu;
use AlbrightLabs\Client\Models\Settings;
use Backend\Classes\Controller;

/**
 * Clients Back-end Controller
 */
class Clients extends Controller
{
    // use \October\Rain\Extension\ExtensionTrait;

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
        // Add tax rate field to invoice based on settings
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
