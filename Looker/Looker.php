<?php namespace Presenter;
/**
 * Presenter
 * 
 * @copyright   Copyright (c) 2015 Warrick Bayman.
 * @author		Warrick Bayman <me@warrickbayman.co.za>
 * @license     MIT License http://opensource.org/licenses/MIT
 * 
 */

class Looker
{
    private static $presenterClassPath = 'Presenters';

    private function __construct()
    {
    }


    public static function init($presentClassPath = null)
    {
        self::$presenterClassPath = is_null($presentClassPath) ? 'Presenters' : $presentClassPath;
    }


    public static function getPresenterClassPath()
    {
        return self::$presenterClassPath;
    }
}