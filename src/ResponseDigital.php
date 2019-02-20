<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 20/02/19
 * Time: 15:57
 */

namespace Modalnetworks\DigitalLibrary;


use Modalnetworks\DigitalLibrary\Contracts\ResponseDigitalContract;

class ResponseDigital implements ResponseDigitalContract
{
    protected $message;

    protected $link;

    public function __construct($link = null, $message = null)
    {
           $this->link = $link;
           $this->message = $message;
    }

    public function link()
    {
        return $this->link;
    }

    public function message()
    {
       return $this->message;
    }
}