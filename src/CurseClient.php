<?php

namespace CurseApi;

use CurseApi\Middleware\AuthMiddleware;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\InvalidArgumentException;
use GuzzleHttp\HandlerStack;

class CurseClient extends Client
{
    public function __construct(array $config = [])
    {
        $config = array_merge([
            'base_uri' => 'https://api.curseforge.com',
        ], $config);

        if (empty($config['api_key'])) {
            throw new InvalidArgumentException('You must provide an api_key');
        }

        if (empty($config['handler'])) {
            $config['handler'] = HandlerStack::create();
        }
        
        $config['handler']->push(new AuthMiddleware());

        parent::__construct($config);
    }
}
