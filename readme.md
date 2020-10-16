# Nova Settings

## Installation

Install the package in a Laravel Nova project via Composer:

```bash
composer require codicastudio/setting-manager
```

To publish the database migration(s) configuration of `akaunting/setting`

```bash
php artisan vendor:publish --tag=setting
php artisan vendor:publish --tag=setting-manager
php artisan migrate
```

Register the tool with Nova in the `tools()` method of the `NovaServiceProvider`:

```php
// in app/Providers/NovaServiceProvider.php

public function tools()
{
    return [
        // ...
        new \codicastudio\SettingManager\SettingManagerTool
    ];
}
```


## Usage

### Registering fields

Define the fields in your `NovaServiceProvider`'s `boot()` function by calling `SettingManager::addSettingsFields()`.

```php
\codicastudio\SettingManager\SettingManagerTool::addSettingsFields([
    Text::make('Some setting', 'some_setting'),
    Number::make('A number', 'a_number')
]);

// OR

// Using a callable
\codicastudio\SettingManager\SettingManagerTool::addSettingsFields(function() {
  return [
    Text::make('Some setting', 'some_setting'),
    Number::make('A number', 'a_number'),
  ];
});
```

## Configuration

### reload_page_on_save 

This feature is turned off per default. You may turn it on by changing `reload_page_on_save` value from 
`false` to `true` under `config/setting-manager.php` to reload the entire page on save. Useful when updating any Nova UI related settings.

# Credits

Thanks for the inspiration.

### akaunting/setting

You can visit [https://github.com/akaunting/setting]() to get more information on how to use getters/setters and facade of settings package.

### optimistdigital/setting-manager
This package is inspired by [optimistdigital/setting-manager](https://github.com/optimistdigital/setting-manager)
