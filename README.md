# WebFramework MySQL Module

This module provides MySQL database integration for WebFramework.

## Installation

Install via Composer:

```bash
composer require avoutic/web-framework-mysql
```

## Requirements

- PHP 8.2 or higher
- MySQL server
- PHP mysqli extension
- WebFramework core package (^8)

## Configuration

If you are using the definition from _definitions/defitinions.php_. You can just add the following _db_config.main.php_ to your auth config directory (_config/auth_):

```php
<?php

return [
    'database_host' => 'localhost',
    'database_user' => 'your_user',
    'database_password' => 'your_password',
    'database_database' => 'your_database'
]
```

## License

MIT License - see LICENSE file for details. 