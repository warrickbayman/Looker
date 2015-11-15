<?php
namespace Looker\Tests;
use Looker\Traits\Presentable;

/**
 * Looker
 *
 * @copyright     Copyright (c) 2015 Warrick Bayman.
 * @author        Warrick Bayman <me@warrickbayman.co.za>
 * @license       MIT License http://opensource.org/licenses/MIT
 *
 */

class User
{
    use Presentable;

    public $age = 30;

    public function first_name()
    {
        return 'First';
    }


    public function last_name()
    {
        return 'Last';
    }
}