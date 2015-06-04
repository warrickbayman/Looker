<?php namespace Looker;
use Looker\Contracts\PresenterContract;

/**
 * Presenter
 * 
 * @copyright   Copyright (c) 2015 Warrick Bayman.
 * @author		Warrick Bayman <me@warrickbayman.co.za>
 * @license     MIT License http://opensource.org/licenses/MIT
 * 
 */

abstract class Presenter implements PresenterContract
{
    /**
     * @var
     */
    private $entity;


    /**
     * @param $entity
     */
    function __construct($entity)
    {
        $this->entity = $entity;
    }


    /**
     *
     * @param $name
     *
     * @return mixed
     */
    function __get($name)
    {
        if (method_exists($this, $name)) {
            return $this->{$name}();
        }

        return $this->entity->{$name};
    }
}