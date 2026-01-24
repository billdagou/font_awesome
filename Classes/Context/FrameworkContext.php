<?php
namespace Dagou\FontAwesome\Context;

use Dagou\FontAwesome\Type\Framework;
use Psr\Http\Message\ServerRequestInterface;

final class FrameworkContext {
    protected string $key = 'fa-framework';
    protected static Framework $framework;

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(
        private readonly ServerRequestInterface $request
    ) {}

    /**
     * @param \Dagou\FontAwesome\Type\Framework $framework
     *
     * @return void
     */
    public function set(Framework $framework): void {
        self::$framework = $framework;

        $this->request->getAttribute('frontend.user')
            ->setKey('ses', $this->key, $framework);
    }

    /**
     * @return \Dagou\FontAwesome\Type\Framework
     */
    public function get(): Framework {
        return self::$framework ?? $this->request->getAttribute('frontend.user')->getKey('ses', $this->key);
    }
}