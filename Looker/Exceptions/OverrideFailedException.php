<?php

namespace Looker\Exceptions;
use Exception;

/**
 * Looker
 *
 * @copyright     Copyright (c) 2015 Warrick Bayman.
 * @author        Warrick Bayman <me@warrickbayman.co.za>
 * @license       MIT License http://opensource.org/licenses/MIT
 *
 */

class OverrideFailedException extends \Exception
{
    public function __construct($overrideName, $code = 0, Exception $previous = null)
    {
        $message = '"' . $overrideName . '" override failed.';
        parent::__construct($message, $code, $previous);
    }
}
