Spress - Static site generator
==============================
[![Build Status](https://travis-ci.org/yosymfony/Spress.png?branch=master)](https://travis-ci.org/yosymfony/Spress)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/yosymfony/Spress/badges/quality-score.png?s=2fde9d65f127dad64c6d3d68f5c47da9b41dfc1b)](https://scrutinizer-ci.com/g/yosymfony/Spress/)

Spress is a static site generator building on Silex and Twig and inspired by 
[Jekyll](https://github.com/mojombo/jekyll). See [demo](http://yosymfony.github.io/Spress-example/).

License: [MIT](https://github.com/yosymfony/Spress/blob/master/LICENSE)

Require
-------

* PHP >= 5.4
* [Composer](http://getcomposer.org/)

Getting Started
--------------

* Download the last [release](https://github.com/yosymfony/Spress/releases) or clone repository `git clone https://github.com/yosymfony/Spress.git`.
* Get vendors
* Create a blank site.
* Build your site.

### Get vendors

Use Composer to get vendors:

```
$ cd your-path
$ composer.phar update
```

### spress command

Spress command are located in `bin/spress` and you can use this command to create a new site or process your
site.

#### site:new

Create a new site.

`site:new [path[="./"]] [template[="blank"]] [--force] [--all]`

`--force` option force to use the path even though exists and it's not empty.
`--all` In blank template, creates the complete scaffold.

E.g `$ spress site:new /your-site-dir`

#### site:build

Build your site in your configured destination, typically `_site`. 

`site:build [-s|--source[="./"]] [--timezone[="..."]] [--drafts] [--safe]`

E.g `$ spress site:build -s /your-site-dir`


Unit tests
----------

You can run the unit tests with the following command:
```
$ cd your-path
$ composer.phar install --dev
$ phpunit
```