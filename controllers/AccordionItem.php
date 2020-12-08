<?php namespace Pensoft\Accordions\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class AccordionItem extends Controller
{
	use \October\Rain\Database\Traits\Sortable;

    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
	public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Pensoft.Accordions', 'main-menu-item', 'side-menu-item');
    }
}
