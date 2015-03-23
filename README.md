# PsLabirynthBundle

Include following code into your composer.json file:

```json
"require": {
    "piotr-szczygiel/labyrinth-bundle": "dev-master"
},    
"repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:piotr-szczygiel/PsLabyrinthBundle.git"
    }
]
```

How to run it:  
```$php app/console labyrinth:solve /var/www/symfony/vendor/piotr-szczygiel/PsLabyrinthBundle/Resources/doc/lab.txt```
