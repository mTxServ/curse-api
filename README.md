Curse API
==========

[![Latest Stable Version](https://poser.pugx.org/mtxserv/curse-api/v/stable.png)](https://packagist.org/packages/mtxserv/curse-api)

Curse Api is a modern PHP library based on Guzzle for [CurseForge](https://docs.curseforge.com/#getting-started).

## Dependencies

* PHP 7
* [Guzzle](http://www.guzzlephp.org): ^7.0

## Installation

Installation of Curse Api is only officially supported using Composer:

```sh
php composer.phar require mtxserv/curse-api
```

## Example

```php
<?php

use CurseApi\CurseClient;
use GuzzleHttp\Exception\GuzzleException;

$client = new CurseClient([
    'api_key' => 'YOUR_API_KEY', // https://console.curseforge.com/?#/api-keys
]);

try {
    // Get Games
    $response = $client->get('/v1/games');
    $json = json_decode($response->getBody()->getContents(), \JSON_THROW_ON_ERROR);
    print_r($json);
    
    // Get All the Mods 7
    $response = $client->get('/v1/games/mods/426926');
    $json = json_decode($response->getBody()->getContents(), \JSON_THROW_ON_ERROR);
    print_r($json);
    
    // Get All the Mods 7 - Files
    $response = $client->get('/v1/games/mods/426926/files');
    $json = json_decode($response->getBody()->getContents(), \JSON_THROW_ON_ERROR);
    print_r($json);
} catch (GuzzleException $e) {
    echo $e->getMessage();
    exit;
}
```
