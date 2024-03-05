<?php namespace TestAuthor\TestPlugin2\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Sects Back-end Controller
 */
class Sects extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('TestAuthor.TestPlugin2', 'testplugin2', 'sects');
    }

    public function create_onSave($context = null){

        parent::create_onSave($context);


        \Mail::later(1, 'backend::mail.newsect', [], function($message) {

            $message->to('hicawi1240@mcuma.com', 'Admin Person');
            $message->subject('This is a notify');

        });
        

        return \Backend::redirect('testauthor/testplugin2/sects');


    }
}
