<?php
/**
 * File name: Request.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Http;


/**
 * Class Request
 */
class SimpleRequest implements IRequest
{

    /**
     * @var mixed $data
     * @access protected
     */
    protected $data;

    /**
     * @var mixed $post
     * @access protected
     */
    protected $post;

    /**
     * Constructor
     *
     * @param array $serverGlobal
     */
    public function __construct($serverGlobal = [])
    {
        if (empty($serverGlobal)) {
            throw new \InvalidArgumentException(
                __METHOD__.': $serverGlobal cannot be empty'
            );
        }

        $this->data = json_decode(json_encode($_SERVER));

        $this->post = null;

        if ($this->data->REQUEST_METHOD === 'POST') {
            $this->post = json_decode(json_encode($_POST));
        }
    }

    /**
     * Function getPost
     *
     * @return mixed
     *
     * @access public
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Function getUri
     *
     * @return string
     *
     * @access public
     */
    public function getUri()
    {
        return $this->data->REQUEST_URI;
    }
}
