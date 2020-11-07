<?php namespace Thrive\RecaptchaFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Thrive\RecaptchaFieldType\Rules\ValidRecaptcha;

class RecaptchaFieldType extends FieldType
{
    
    protected $columnType = 'text';

    //validrecaptcha
    protected $rules = [
        ''
    ];

    //validrecaptcha
    protected $validators = [
        '' => [
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
    protected $inputView = NULL;

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'thrive.field_type.recaptcha::filter';    


    public function getInputView()
    {
        if ($view = parent::getInputView()) {
            return $view;
        }

        return 'thrive.field_type.recaptcha::input_' . $this->mode();
    }

    /**
     * Return the input mode.
     *
     * @return string
     */
    public function mode()
    {
        return $this->config('mode') ?: config('thrive.field_type.recaptcha::mode', 'invisible');
    }    

    public function position()
    {
        return $this->config('position') ?: config('thrive.field_type.recaptcha::position', 'inline');
    }

}
