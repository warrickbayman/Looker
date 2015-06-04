<?php namespace Presenter\Exceptions;
use Exception;

/**
 * Presenter
 * 
 * @copyright   Copyright (c) 2015 Warrick Bayman.
 * @author		Warrick Bayman <me@warrickbayman.co.za>
 * @license     MIT License http://opensource.org/licenses/MIT
 * 
 */

class InvalidPresenterException extends \Exception
{
    public function __construct($presenterClassName, $code = 0, Exception $previous = null)
    {
        $message = 'Invalid presenter class ' . $presenterClassName;
        parent::__construct($message, $code, $previous);
    }

}