Modalnetworks Package Digital Library
=============================================================


### Install

``` php
  composer require modalnetworks/digital-library
```

> ### Use in application

```php
  
use Modalnetworks\DigitalLibrary\AuthenticatedBook;
use Modalnetworks\DigitalLibrary\DigitalSettings;
use Modalnetworks\DigitalLibrary\Digital;
use Modalnetworks\DigitalLibrary\Contracts\ResponseDigitalContract;

$data = [
    'FirstName' => 'Joe',
    'LastName' => 'Legal',
    'Email'    => 'joe@legal.fake.com',
    'Isbn'     => '9788502628489'
    ];
//start item with data
$book = new AuthenticatedBook($data);
//add your token
$token = 'your_token';

/**
* configure with your token
* opitional param for add name application
*/
$settings = new DigitalSettings($token);

//add settings in digital library for get url authenticated for read ebook
$digital = new Digital($settings);

//run for get link 
$digital->run($book, function(ResponseDigitalContract $digital){
    dump($digital);
});
 
 
```