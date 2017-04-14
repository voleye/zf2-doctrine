<?php

namespace Instagram\Endpoint;

use Instagram\EndpointGetInterface;
use MyProject\Proxies\__CG__\OtherProject\Proxies\__CG__\stdClass;

class UserMediaRecent implements EndpointGetInterface
{
    const API_URI       = 'https://api.instagram.com/v1/users/%s/media/recent/?client_id=%s';
    const ITEMS_COUNT   = 10;

    protected $config = array();

    public function get(array $params = array())
    {
        $userId = isset($params['user_id'])
            ? $params['user_id']
            : (isset($this->config['user_id']) ? $this->config['user_id'] : null);

        $clientId = isset($params['client_id'])
            ? $params['client_id']
            : (isset($this->config['client_id']) ? $this->config['client_id'] : null);

        if (null === $userId || null === $clientId) {
            throw new \InvalidArgumentException('Variables "user_id" and/or "client_id" does not specified');
        }

        $result = file_get_contents(sprintf(self::API_URI, $userId, $clientId));
        $result = \Zend\Json\Json::decode($result);
        $result = $this->filterResult($result);

        return $result;
    }

    protected function filterResult($result)
    {
        $filterResult = array();

        $i = 0;
        foreach ($result->data as $item) {
            $filterResult[] = (object)array(
                'images' => $item->images,
                'link'   => $item->link,
            );

            $i++;
            if ($i >= self::ITEMS_COUNT) {
                break;
            }
        }
        $filterResult = (object)$filterResult;
        return $filterResult;
    }

    /**
     * Set config
     *
     * @param  array $config
     * @return mixed
     */
    public function setConfig(array $config = array())
    {
        $this->config = $config;
    }
}
