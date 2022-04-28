<?php

namespace Controllers;

use Core\View;

class Index extends AbstractController
{
    /**
     * @var View
     */

    public function index(){
        $this->view->render('index_index_page');
    }
}
