<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'instagram.endpoint' => 'Instagram\EndpointFactory',

        ),
    ),
    'di' => array(
        'instance' => array(
            'Instagram\Endpoint' => array(
                'parameters' => array(
                    'cache' => 'Zend\Cache\Storage\Adapter\AbstractAdapter',
                    'cfg' => array(
                        'user_id' => '1369633041',
                        'client_id' => 'c95868409e4d4394baae8b14f50d804f',
                    )
                ),
            )
        ),
    )
);
