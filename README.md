# Laravel Flash Notifications

[![Build Status](https://travis-ci.org/squareboat/flash.svg?branch=master)](https://travis-ci.org/squareboat/flash)

Laravel 5 flash messages, originally developed after the Laracasts video tutorial on the same topic: [Flexible Flash Messages](https://laracasts.com/lessons/flexible-flash-messages).

## Install

### Install via composer

```
$ composer require squareboat/flash
```

### Configure Laravel

Once installation operation is complete, simply add both the service provider and facade classes to your project's `config/app.php` file:

#### Service Provider
```
SquareBoat\Flash\FlashServiceProvider::class,
```

#### Facade

```
'Flash' => SquareBoat\Flash\Facades\Flash::class,
```

### Include default alert view to your layout

Package default provides bootstrap ready alert view. Just include `flash::message` file to your main layout in blade:

```
@include('flash::message')
```

or if you don't use blade:

```
<?= view('flash::message') ?>
```

If you need to modify the flash message partials, you can run:

```
php artisan vendor:publish
```

The package view will now be located in the `resources/views/vendor/flash` directory.

And that's it! With your coffee in reach, start flashing out messages!

## Usage

Within your controllers, before you perform a redirect...

```
public function create()
{
    // do something awesome...

    flash()->success('Resource created successfully!');

    return redirect()->route('dashboard');
}
```

### Level for all alerts are following:

**Success**
```
Flash::success('This is a success message.');
```
or
```
flash()->success('This is a success message.');
```

**Info**
```
Flash::info('This is an info message.');
```
or
```
flash()->info('This is an info message.');
```

**Warning**
```
Flash::warning('This is a warning message.');
```
or
```
flash()->warning('This is a warning message.');
```

**Error**
```
Flash::error('This is an error message.');
```
or
```
flash()->error('This is an error message.');
```

**Important**
```
Flash::info('This is an important message.')->important();
```
or
```
flash('This is an important message.')->important();
```

## Hiding Flash Messages

A common desire is to display a flash message for a few seconds, and then hide it. To handle this, write a simple bit of JavaScript. For example, using jQuery, you might add the following snippet just before the closing </body> tag.

```
<script>
  $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
```

This will find any alerts - excluding the important ones, which should remain until manually closed by the user - wait three seconds, and then fade them out.

# License

The MIT License. Please see [License File](LICENSE.md) for more information. Copyright © 2016 [SquareBoat](https://squareboat.com)
