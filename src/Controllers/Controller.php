<?php
/**
 * File name: Controller.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;


use Common\Http\IRequest;

abstract class Controller
{
    /**
     * @var IRequest $request
     * @access protected
     */
    protected $request;

    /**
     * Function execute - Executes the controllers main action
     *
     * @return mixed
     *
     * @access public
     */
    abstract public function action();

    /**
     * Function setRequest - Sets the current request in the controller
     *
     * @param \Common\Http\IRequest $request
     * @return mixed
     *
     * @access public
     */
    public function setRequest(IRequest $request)
    {
        if (empty($request)) {
            throw new \InvalidArgumentException(
                __METHOD__.': $request cannot be empty'
            );
        }

        $this->request = $request;
    }
}
