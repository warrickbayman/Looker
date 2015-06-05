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
    private static $presenterClassSuffix = null;

    private function __construct()
    {
    }


    /**
     * @param null $presentClassPath
     * @param null $presenterClassSuffix
     */
    public static function init($presentClassPath = null, $presenterClassSuffix = null)
    {
        self::$presenterClassPath = is_null($presentClassPath) ? 'Presenters' : $presentClassPath;
        self::$presenterClassSuffix = is_null($presenterClassSuffix) ? null : $presenterClassSuffix;
    }


    public static function getPresenterClassPath()
    {
        return self::$presenterClassPath;
    }


    public static function getPresenterClassSuffix()
    {
        return self::$presenterClassSuffix;
    }
}