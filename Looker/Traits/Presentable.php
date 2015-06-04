<?php namespace Looker\Traits;
use Looker\Exceptions\InvalidPresenterException;

/**
 * Presenter
 * 
 * @copyright   Copyright (c) 2015 Warrick Bayman.
 * @author		Warrick Bayman <me@warrickbayman.co.za>
 * @license     MIT License http://opensource.org/licenses/MIT
 * 
 */

trait Presentable
{
    private $instance;

    public function present()
    {
        if (!isset($this->presenter)) {
            $classPath = explode('\\', get_class($this));
            $className = $classPath[count($classPath) -1];
            $root = substr(__NAMESPACE__, 0, strpos(__NAMESPACE__, '\\'));

            $this->presenter = $root . '\Presenters\\' . $className;
        }

        if (!class_exists($this->presenter)) {
            throw new InvalidPresenterException($className);
        }

        if (!isset($this->instance)) {
            $this->instance = new $this->presenter($this);
        }
        return $this->instance;
    }
}