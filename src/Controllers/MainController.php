<?php
/**
 * File name: MainController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;


use Views\LoginForm;

/**
 * Class MainController
 */
class MainController extends Controller
{

    /**
     * Function execute - Executes the controllers main action
     *
     * @return mixed
     *
     * @access public
     */
    public function action()
    {
        $view = new LoginForm();
        $view->show();
    }
}
