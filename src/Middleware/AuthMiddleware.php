<?php

namespace CurseApi\Middleware;

use GuzzleHttp\Psr7\Request;

class AuthMiddleware
{
    /**
     * Add API key header to the request.
     */
    public function __invoke(callable $handler)
    {
        return function (Request $request, array $options) use ($handler) {
            $request = $request->withHeader('x-api-key', $options['api_key']);
            return $handler($request, $options);
        };
    }
}