<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 20/02/19
 * Time: 12:01
 */

namespace Modalnetworks\DigitalLibrary\Contracts;


interface BookContract
{
   const AUTHENTICATED = 'AuthenticatedUrl';

   public function body();
   public function message();
   public function link();
    public function action();
   public function isSuccess($data);

}