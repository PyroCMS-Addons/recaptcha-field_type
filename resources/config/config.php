<?php

//'version_3'  => 'thrive.field_type.recaptcha::config.mode.version_3',
//'invisible' => 'thrive.field_type.recaptcha::config.mode.invisible',

return [
    'mode'        => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'default_value' => 'invisible',
            'options' => [
                'checkbox'  => 'thrive.field_type.recaptcha::config.mode.checkbox',
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
            ],
        ],
    ],
];

//'bottomleft' => 'thrive.field_type.recaptcha::config.position.bottomleft',
//'bottomright' => 'thrive.field_type.recaptcha::config.position.bottomright',
