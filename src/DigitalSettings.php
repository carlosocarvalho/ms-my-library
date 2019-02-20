<?php

namespace Modalnetworks\DigitalLibrary;


use Modalnetworks\DigitalLibrary\Contracts\DigitalSettingContract;

/**
 * Class DigitalSettings
 * @package Modalnetworks\DigitalLibrary
 */
class DigitalSettings implements DigitalSettingContract
{
    /**
     * @var string
     */
    private $url = 'https://digitallibrary.zbra.com.br/DigitalLibraryIntegrationService/';

    /**
     * @var
     */
    private $token;

    /**
     * @var string
     */
    protected $clientName = 'dev';



    /**
     * DigitalSettings constructor.
     * @param $token
     */
    public function __construct($token, $clientName = 'dev')
    {
          $this->token = $token;
          $this->clientName = $clientName;
    }

    public function token()
    {
        return $this->token;
    }

    public function uri()
    {
       return $this->url;
    }

    public function clientName()
    {
        return $this->clientName;
    }
}