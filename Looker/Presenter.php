<?php namespace Looker;
use Looker\Contracts\PresenterContract;
use Looker\Exceptions\OverrideFailedException;

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
    protected $entity;


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

        if (method_exists($this->entity, $name)) {
            return $this->entity->{$name}();
        }
        if (property_exists($this->entity, $name)) {
            return $this->entity->{$name};
        }

        throw new OverrideFailedException($name);
    }
}
