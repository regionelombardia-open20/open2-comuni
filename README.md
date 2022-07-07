# Amos Comuni 

Comuni management.

### Installation
You need to require this package and enable the module in your configuration.

add to composer requirements in composer.json
```
"open20/amos-comuni": "~1.2.16",
```
or run command
***bash***
```bash
composer require "open20/amos-comuni:1.2.16"
```

Enable the Comuni modules in modules-amos.php, add :
```php
 'comuni' => [
	'class' => 'open20\amos\comuni\AmosComuni',
 ],

```

add comuni migrations to console modules (console/config/migrations-amos.php):
```
'@vendor/open20/amos-comuni/src/migrations'
```


This component allows you to create migrations for the updating of the municipalities and their relative CA.P.

To do so:
- Access to #domain#/comuni

from the sub dashboard you can create the migration files for:

- add/update municipalities
- municipalities variations
- cadastral code update
- C.A.P update

##### Is important to create first the migration for import municipalities and lastly the C.A.P

