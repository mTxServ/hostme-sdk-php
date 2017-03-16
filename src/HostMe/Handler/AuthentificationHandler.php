<?php

namespace HostMe\Handler;

use Psr\Http\Message\RequestInterface;

/**
 * Class AuthentificationHandler.
 */
class AuthentificationHandler
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * AuthentificationHandler constructor.
     *
     * @param string $accessToken
     */
    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Called when the middleware is handled.
     *
     * @param callable $handler
     *
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function ($request, array $options) use ($handler) {
            return $handler($this->onBefore($request), $options);
        };
    }

    /**
     * @param RequestInterface $request
     *
     * @return RequestInterface|static
     */
    private function onBefore(RequestInterface $request)
    {
        $queryparams = \GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery());
        $preparedParams = \GuzzleHttp\Psr7\build_query(array_merge([
            'access_token' => $this->accessToken,
        ], $queryparams));
        $request->withUri($request->getUri()->withQuery($preparedParams));

        return $request;
    }
}
