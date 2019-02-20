<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 20/02/19
 * Time: 12:01
 */

namespace Modalnetworks\DigitalLibrary;


class AuthenticatedBook extends BookBase
{
    /**
     * @var string
     */
    protected $elementRoot = 'CreateAuthenticatedUrlRequest';
    /**
     * @var string
     */
    protected $actionName = 'AuthenticatedUrl';
    /**
     * @var array
     */
    protected $fillable = [
        'FirstName' => null,
        'LastName' => null,
        'Email' => null,
        'CourseId' => null,
        'Tag' => null,
        'Isbn' => null
    ];

    /**TODO: implementar campos requireds
     * protected $fillable_required = [];
     * */

    /**
     * AuthenticatedBook constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
         $this->fillable = array_replace($this->fillable, $data);
    }

    /**
     * @return string
     */
    public function body()
    {
        return $this->asXml();
    }


}