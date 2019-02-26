<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 20/02/19
 * Time: 12:04
 */

namespace Modalnetworks\DigitalLibrary;



use Modalnetworks\DigitalLibrary\Contracts\BookContract;

abstract class BookBase implements BookContract
{
    protected $fillable = [];

    protected $elementRoot = 'BookBase';

    protected $actionName;

    protected $charset = 'utf-8';

    protected $link;

    protected $message;

    protected $attributes = [
        'xmlns' => 'http://dli.zbra.com.br',
        'xmlns:xsd' => 'http://www.w3.org/2001/XMLSchema',
        'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance'
    ];

    protected function asXml()
    {
       return BookToXml::convert( $this->makeFillables(),
            ['rootElementName'=> $this->elementRoot,
             '@attributes' => $this->attributes  ],
            true,
            $this->charset
            );

    }

    public function action(){
        return $this->actionName;
    }

    public function isSuccess($data){
        $xml = new \SimpleXMLElement($data);
        if( $xml->Success == "true"){
            $this->link = $xml->{$this->actionName};
            return true;
        }
        $this->message = $xml->Message;
        return false;
    }

    public function link(){
        return (string) $this->link;
    }

    public function message(){
        return (string) $this->message;
    }


    private function makeFillables(){
      return  array_map(function ($value){
            if( is_null($value)){
                return ['_attributes'=> ['xsi:nil'=>"true"]];
            }
            return $value;
      }, $this->fillable);
    }




}