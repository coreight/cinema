<?php
namespace App\Model;

use Jenssegers\Mongodb\Model;


/**
 * Class Messages
 * @package App\Model
 */
class Messages extends Model
{

    /**
     * @var string
     */
    protected $connection = 'mongodb';


    /**
     * @var string
     */
    protected $collection = 'messages';


}