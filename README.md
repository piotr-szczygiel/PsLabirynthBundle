# PsLabirynthBundle 1.0.0

Include following code into your composer.json file:

```json
"require": {
    "piotr-szczygiel/labyrinth-bundle": "1.*"
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
```$php app/console labyrinth:solve /var/www/symfony/vendor/piotr-szczygiel/labyrinth-bundle/Resources/doc/lab.txt```
