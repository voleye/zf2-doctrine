<?php

namespace Instagram;

interface EndpointGetInterface
{
    /**
     * @param  array $params
     * @return string
     */
    public function get(array $params = array());

    /**
     * Set config
     *
     * @param  array $config
     * @return mixed
     */
    public function setConfig(array $config = array());
}
