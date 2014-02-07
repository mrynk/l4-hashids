l4-hashids
==========

A Laravel 4 package for the official hashids library

Installation
============

Add `mrynk\l4-hashids` as a requirement to composer.json:

```javascript
{
    "require": {
        "mrynk/l4-hashids": "master"
    }
}
```

Update your packages with `composer update` or install with `composer install`.

Once Composer has installed or updated your packages you need to register Hashids with Laravel itself. Open up app/config/app.php and find the providers key towards the bottom and add:

```php
'Mrynk\L4Hashids\L4HashidsServiceProvider'
```

Configuration
=============

L4-Hashids's configuration file can be extended by creating `app/config/packages/mrynk/l4-hashids/config.php`. You can find the default configuration file at vendor/mrynk/l4-hashids/src/config/config.php.

You can quickly publish a configuration file by running the following Artisan command.

```
$ php artisan config:publish mrynk/l4-hashids
```

Usage
=====

You can use Hashids to obfuscate your url id's.

Use it in your controller like:
```php
public function myAction( $pHash )
{
	$id = Hashids::decrypt( $pHash );
	Model::find( reset( $id ) );
}
```

Since v2.0 you can define different setting groups. Obviously default is the deafult group. To use another you can explicitly tell so:

Use it in your controller like:
```php
public function myAction( $pHash )
{
	$id = Hashids::make('groupname')->decrypt( $pHash );
	Model::find( reset( $id ) );
}
```

A more cleaner way would be to use it in your route model binding

```php
Route::bind('user', function( $value, $route )
{
    if( $result = User::find( Hashids::decrypt( $value ) ) )
    	return $result;
	throw new NotFoundException;

});

```

