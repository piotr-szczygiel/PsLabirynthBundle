# PsLabirynthBundle

Include following code into your composer.json file:

```json
"require": {
    "piotr-szczygiel/labyrinth-bundle": "dev-master"
}
```

Enable the bundle by adding following into AppKernel.php:  
```php
$bundles = array(
    // ...
    new Ps\LabyrinthBundle\PsLabyrinthBundle(),
);
```

How to run it:  
```$php app/console labyrinth:solve /var/www/symfony/vendor/piotr-szczygiel/PsLabyrinthBundle/Resources/doc/lab.txt```
