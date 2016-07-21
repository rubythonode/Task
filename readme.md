This is a Laravel 5 package that provides task management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `lavalite/task`.

    "lavalite/task": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Lavalite\Task\Providers\TaskServiceProvider::class,

```

And also add it to alias

```php
'Task'  => Lavalite\Task\Facades\Task::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Lavalite\Task\Providers\TaskServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Lavalite\Task\Providers\TaskServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Lavalite\Task\Providers\TaskServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Lavalite\Task\Providers\TaskServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Lavalite\Task\Providers\TaskServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Lavalite\Task\Providers\TaskServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


