<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 20/02/19
 * Time: 16:05
 */

namespace Modalnetworks\DigitalLibrary\Contracts;


interface DigitalSettingContract
{
   public function token();
   public function uri();
   public function clientName();
}