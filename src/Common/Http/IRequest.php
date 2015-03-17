<?php
/**
 * File name: IRequest.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Http;


interface IRequest 
{
    /**
     * Function getPost
     *
     * @return mixed
     *
     * @access public
     */
    public function getPost();

    /**
     * Function getUri
     *
     * @return mixed
     *
     * @access public
     */
    public function getUri();
}
