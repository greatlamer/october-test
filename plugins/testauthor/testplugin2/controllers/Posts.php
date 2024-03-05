<?php namespace TestAuthor\TestPlugin2\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Posts Back-end Controller
 */
class Posts extends Controller
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

    public $sects ;

    public $param_id_sect;

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('TestAuthor.TestPlugin2', 'testplugin2', 'posts');

        $this->param_id_sect = (int) trim(input('id_sect'));


        $this->sects = \TestAuthor\TestPlugin2\Models\Sect::where('visible', true)->lists('title','id');

    }


    
    public function listExtendQueryBefore($query, $definition = null)
    {
        if($this->param_id_sect){
            $query->where('id_sect', '=', $this->param_id_sect);
        } else {
            $query->where('id_sect', '=', 0);

        }
        

            
    }

    function onTest()
    {

        $this->makeLists();
        $this->result = $this->listRender();

    }

    public function create_onSave($context = null)
    {
        parent::create_onSave($context);

        return \Backend::redirect('testauthor/testplugin2/posts?id_sect=' . (int) $_GET['id_sect'] );
    }
    
}
