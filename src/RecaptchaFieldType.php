<?php namespace Thrive\RecaptchaFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Thrive\RecaptchaFieldType\Rules\ValidRecaptcha;

class RecaptchaFieldType extends FieldType
{
    
    protected $columnType = 'text';


    protected $rules = [
        'myrecaptcha'
    ];

    protected $validators = [
        'myrecaptcha' => [
            'message' => 'thrive.field_type.recaptcha::message.not_human',
            'handler' => ValidRecaptcha::class
        ]
    ];
    
    /**
     * The input view.
     * The input view will actually be a button.
     * 
     * For forms using this field-type, override the form view so you dont display the
     * submit button as it is shown here.
     *
     * @var string
     */
    protected $inputView = 'thrive.field_type.recaptcha::input';

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'thrive.field_type.recaptcha::filter';    

}
