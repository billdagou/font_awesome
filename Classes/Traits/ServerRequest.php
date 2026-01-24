<?php
namespace Dagou\FontAwesome\Traits;

use Psr\Http\Message\ServerRequestInterface;

trait ServerRequest {
    /**
     * @return \Psr\Http\Message\ServerRequestInterface
     */
    protected function getRequest(): ServerRequestInterface {
        return $this->renderingContext->getAttribute(ServerRequestInterface::class);
    }
}