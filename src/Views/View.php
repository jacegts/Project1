<?php

namespace Views;


abstract class View
{
    /**
     * @var string $content
     * @access protected
     */
    protected $content;

    /**
     * Function show - displays the content
     *
     * @return mixed
     *
     * @access public
     */
    public function show()
    {
        echo $this->content;
    }
}
