<?php

return [
    'default_value' => [
        'type'  => 'anomaly.field_type.text',
    ],
    'mode'        => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'default_value' => 'invisible',
            'options' => [
                'invisible' => 'thrive.field_type.recaptcha::config.mode.invisible',
                'checkbox'  => 'thrive.field_type.recaptcha::config.mode.checkbox',
                'version_3'  => 'thrive.field_type.recaptcha::config.mode.version_3',
            ],
        ],
    ],  
    'position'        => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'default_value' => 'bottomright',
            'options' => [
                'inline' => 'thrive.field_type.recaptcha::config.position.inline',
                'bottomleft' => 'thrive.field_type.recaptcha::config.position.bottomleft',
                'bottomright' => 'thrive.field_type.recaptcha::config.position.bottomright',
            ],
        ],
    ],       
];
