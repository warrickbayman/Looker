<?php
namespace Looker\Tests;
use Looker\Presenter;

/**
 * Looker
 *
 * @copyright     Copyright (c) 2015 Warrick Bayman.
 * @author        Warrick Bayman <me@warrickbayman.co.za>
 * @license       MIT License http://opensource.org/licenses/MIT
 *
 */

class UserPresenter extends Presenter
{
    public function fullName()
    {
        return $this->entity->first_name() . ' ' . $this->entity->last_name();
    }
}
