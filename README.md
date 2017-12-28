Symfony 3 demo project
======================

This is demo project for learning the Symfony 3 framework.

Installation
------------

1. Clone project

    `$ git clone https://github.com/greeflas/Symfony3.git symfony3-demo`
    
2. Go to project dir
    
    `$ cd symfony3-demo`
    
3. Install dependencies

    `$ composer install`
    
4. Run app with Docker

    `$ docker build -t demo/symfony-app .`
    
    `$ docker run -d --name symfony-demo -p 127.0.0.1:8000:8000 -v /path/to/app/symfony3-demo:/symfony-app demo/symfony-app`
    
    `$ docker start symfony-demo` - start web server
    
    `$ docker stop symfony-demo` - stop web server

Doctrine
--------

### CLI

`$ ./bin/console doctrine:database:create` - creates DB from config

`$ ./bin/console doctrine:generate:entity` - generate entity class

`$ ./bin/console doctrine:schema:validate` - validate entity class and DB schema

`$ ./bin/console doctrine:schema:update` - update DB schema

> `--dump-sql` - output SQL to console

> `--force` - update DB schema