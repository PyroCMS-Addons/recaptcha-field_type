<?php

return [
    'default_value' => [
        'type'  => 'anomaly.field_type.text',
    ],
    'mode'        => [
        'type'     => 'anomaly.field_type.select',
        'required' => true,
        'config'   => [
            'options' => [
                'invisible' => 'thrive.field_type.recaptcha::config.mode.invisible',
                'checkbox'  => 'thrive.field_type.recaptcha::config.mode.checkbox',
            ],
        ],
    ],    
];
