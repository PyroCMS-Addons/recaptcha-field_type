<?php namespace Thrive\RecaptchaFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Carbon\Carbon;
use Thrive\RecaptchaFieldType\RecaptchaFieldType;

/**
 *
 */
class RecaptchaFieldTypeModifier extends FieldTypeModifier
{

    /**
     * The datetime field type.
     * This is for IDE hinting.
     *
     * @var DatetimeFieldType
     */
    protected $fieldType;



    /**
     * Create a new DatetimeFieldTypeModifier instance.
     *
     * @param RecaptchaFieldType $fieldType
     */
    public function __construct(RecaptchaFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }



    /**
     * Modify the value.
     *
     * @param $value
     * @return null|string
     */
    public function modify($value)
    {
        $value = '<code>' . \Request::ip() . '</code> | <small>' . Carbon::now() .'</small>';
        // if ($value && !$this->validate($value)) {
        //     $value = NULL;
        // }

        return parent::modify($value);
    }

    /**
     * Restore the value.
     *
     * @param $value
     * @return null|string
     */
    public function restore($value)
    {
        return parent::restore($value);
    }

    /**
     * Validate the reCAPTCHA
     *
     * returns true if passes.
     *
     * @param $value
     * @return bool
     */
    // protected function validate($value)
    // {
    //     return true;
    // }
}
