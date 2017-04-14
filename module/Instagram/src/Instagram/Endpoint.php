<?php

namespace Instagram;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Cache\Storage\Adapter\AbstractAdapter as CacheAdapter;

class Endpoint
{
    const ENDPOINT_USER_MEDIA_RECENT = 'user.media.recent';

    const CACHE_PREFIX = 'instagram_endpoints_';

    protected $nameEndpointPair = array(
        'user.media.recent' => 'Instagram\Endpoint\UserMediaRecent'
    );

    /**
     * @var array
     */
    protected $endpoints = array();

    /**
     * @var CacheAdapter
     */
    protected $cache;

    /**
     * Config
     *
     * @var array
     */
    protected $config;

    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    public function __construct(
        ServiceLocatorInterface $serviceLocator,
        CacheAdapter $cache,
        $cfg = array()
    )
    {
        $this->serviceLocator = $serviceLocator;
        $this->cache = $cache;
        $this->config = $cfg;

    }

    /**
     * Retrieve data through instagram API or from cache
     *
     * @param  string $name
     * @param  array $params
     * @return string
     * @throws \InvalidArgumentException
     */
    public function get($name, array $params = array())
    {
        $cacheKey = self::CACHE_PREFIX . md5($name . implode($params));
        $result = $this->cache->getItem($cacheKey);
        if (!$result) {
            if (!isset($this->endpoints[$name])) {
                if (!isset($this->nameEndpointPair[$name])) {
                    throw new \InvalidArgumentException(sprintf('Requested endpoint name is undefined "%s"', $name));
                }
                $this->endpoints[$name] = $this->serviceLocator->get($this->nameEndpointPair[$name]);
            }

            /** @var \Instagram\EndpointGetInterface $endpoint */
            $endpoint = $this->endpoints[$name];
            $endpoint->setConfig($this->config);

            $result = $endpoint->get($params);
            $this->cache->setItem($cacheKey, $result);
        }
        return $result;
    }
}
