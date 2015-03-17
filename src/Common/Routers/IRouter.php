<?php
/**
 * File name: IRouter.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Routers;


use Common\Http\IRequest;

interface IRouter
{
    /**
     * Function handle - Route the HTTP request through the application
     *
     * @param  \Common\Http\IRequest $request
     *
     * @access public
     */
    public function handle(IRequest $request);
}
