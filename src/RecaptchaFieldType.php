<?php namespace Thrive\RecaptchaFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Thrive\RecaptchaFieldType\Rules\ValidRecaptcha;

class RecaptchaFieldType extends FieldType
{

    protected $columnType = 'text';

    protected $rules = [
        'recaptcha'
    ];

    protected $validators = [
        'recaptcha' => [
            'handler' => ValidRecaptcha::class,
            'message' => 'thrive.field_type.recaptcha::message.not_human'
        ]
    ];

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = NULL;


    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = NULL;


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


    public function getPlaceholder()
    {
        $placeholder = parent::getPlaceholder();

        if ($placeholder === false) {
            return null;
        }

        if ($placeholder === null) {
            return null;
        }

        return $placeholder;
    }

}
