<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 20/02/19
 * Time: 12:00
 */

namespace Modalnetworks\DigitalLibrary;

use GuzzleHttp\Exception\ClientException;
use Modalnetworks\DigitalLibrary\Contracts\BookContract;
use Modalnetworks\DigitalLibrary\Contracts\DigitalSettingContract;
use Modalnetworks\DigitalLibrary\Exceptions\NoBodyException;
use GuzzleHttp\Client;

/**
 * Class Digital
 * @package Modalnetworks\DigitalLibrary
 */
class Digital
{
    /**
     * @var string
     */
    protected $api = 'https://digitallibrary.zbra.com.br/DigitalLibraryIntegrationService/';

    /**
     * @var string
     */
    protected $token = '4d855b4c-4bcb-4aee-a226-c9f0aae3ba38';




    protected $options;

    public function __construct(DigitalSettingContract $options)
    {
       $this->options = $options;
    }

    /**
     * @param BookContract $book
     * @param \Closure|null $callback
     * @return mixed
     * @throws NoBodyException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function run(BookContract $book, \Closure $callback = null)
    {

        if (!$book->body())
            throw new NoBodyException("Nenhum conteudo enviado");
        $http = new Client([
            'debug' => false
        ]);
        try {
            $url = sprintf("%s%s", $this->options->uri(), $book->action());
            $request = $http->request(
                'POST',
                $url,
                [
                    'body' => $book->body(),
                    'headers' => $this->headers()
                ]
            );
            if( $book->isSuccess($request->getBody()) === true){
               return $callback( new ResponseDigital( $book->link()));
            }
            return $callback( new ResponseDigital( null, $book->message() ));

        } catch (ClientException $e) {
            $callback( new ResponseDigital(null, $e->getMessage()));
        }


    }

    /**
     * @return array
     */
    protected function headers()
    {
        return [
            'User-Agent' => sprintf("modalnetworks/%s", $this->options->clientName()),
            'Content-Type' => 'application/xml;charset=utf-8',
            'Accept' => 'application/xml',
            'X-DigitalLibraryIntegration-API-Key' => $this->options->token(),
            'Host' => 'digitallibrary.zbra.com.br',
            'Expect' => '100-continue',
            'Accept-Enconding' => 'gzip, deflate',
            'Connection' => 'Keep-Alive'
        ];
    }

}