<?php namespace Looker\Traits;
use Looker\Exceptions\InvalidPresenterException;
use Presenter\Looker;

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
        $defaultClassPath = Looker::getPresenterClassPath();
        $presenterClassSuffix = Looker::getPresenterClassSuffix();

        if (!isset($this->presenter)) {
            $classPath = explode('\\', get_class($this));
            $className = $classPath[count($classPath) -1];
            $root = substr(get_class(), 0, strpos(get_class(), '\\'));
            //$root = substr(__NAMESPACE__, 0, strpos(__NAMESPACE__, '\\'));

            $this->presenter = $root . '\\' . $defaultClassPath . '\\' . $className . $presenterClassSuffix;
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