# Looker

[![Build Status](https://travis-ci.org/warrickbayman/Looker.svg)](https://travis-ci.org/warrickbayman/Looker)
[![Stable](https://poser.pugx.org/warrickbayman/looker/v/stable.svg)](https://packagist.org/packages/warrickbayman/looker)
[![Latest Unstable Version](https://poser.pugx.org/warrickbayman/looker/v/unstable)](https://packagist.org/packages/warrickbayman/looker)
[![License](https://poser.pugx.org/warrickbayman/looker/license)](https://packagist.org/packages/warrickbayman/looker)

A simple PHP presenter library.

## Why
Well, it's quite common to separate your presentation code from your models. When I started with PHP I found myself doing things like: 

```php
//User.php

class User extends Model
{
    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

// view.php
<?php echo $user->fullName(); ?>
```

This is bad. So Looker separates your presentation stuff out of your models. It's based on the simple presentation library that Jeffery Way wrote for [Laracasts](https://laracasts.com).

## Installation
Use composer:

```
composer require warrickbayman/looker
```


## Usage
In your model add the `Looker\Presentable` trait:

```php

use Looker\Traits\Presentable;

class User
{
    use Presentable;
}
```

Create a new view presenter that extends the `Looker\Presenter` class

```php
use Looker\Presenter;

class User extends Presenter
{
    public function fullName()
    {
        return $this->entity->first_name . ' ' . $this->entity->last_name;
    }
}
```

Now, in your view:

```php
echo $this->present()->fullName;
```

From within the presenter, `$this->entity` is the associated model.

By default, Looker will look in the `Http\Presenters` namespace for presenter classes, but you can change that. Somewhere in your intialization, call the `Looker::init` method and pass in the class path for your presenters:

```php
Looker\Looker::init('Presenters');
```

You can also pass in a "suffix" if you like to do things like add the word "Presenter" to the end of your presenter classes:

```php
Looker\Looker::init('Presenters', 'Presenter');
```

Now Looker will look for `UserPresenter` instead of just `User`.

## Overriding Model Members
Looker will automatically override model members. So you can do:

```php
echo $user->present()->dateOfBirth;
```

even if the `dateOfBirth` method or property doesn't exist on your presenter. Looker will first look for a method by the same name on the model. If a method doesn't exist, it will then look for a property by the same name. Looker will throw a `OverrideFailed` exception if there is no method or property to call.


