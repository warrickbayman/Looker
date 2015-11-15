<?php


/**
 * Looker
 *
 * @copyright     Copyright (c) 2015 Warrick Bayman.
 * @author        Warrick Bayman <me@warrickbayman.co.za>
 * @license       MIT License http://opensource.org/licenses/MIT
 *
 */
class LookerTest extends TestCase
{
    /** @test */
    public function it_can_be_initialised()
    {
        \Looker\Looker::init('Tests\\Presenters', 'Presenter');
        $this->assertEquals('Tests\\Presenters', \Looker\Looker::getPresenterClassPath());
        $this->assertEquals('Presenter', \Looker\Looker::getPresenterClassSuffix());
    }


    /** @test */
    public function it_can_create_a_presenter_class()
    {
        \Looker\Looker::init('Tests', 'Presenter');
        $model = new \Looker\Tests\User();

        $name = $model->first_name() . ' ' . $model->last_name();
        $this->assertEquals($name, $model->present()->fullName);
    }


    /** @test */
    public function it_can_override_model_methods()
    {
        \Looker\Looker::init('Tests', 'Presenter');
        $model = new \Looker\Tests\User();

        $this->assertEquals($model->first_name(), $model->present()->first_name);
    }


    /** @test */
    public function it_can_override_model_properties()
    {
        \Looker\Looker::init('Tests', 'Presenter');
        $model = new Looker\Tests\User();

        $this->assertEquals($model->age, $model->present()->age);
    }
}
