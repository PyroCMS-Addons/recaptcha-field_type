<?php namespace Thrive\RecaptchaFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Carbon\Carbon;

/**
 *
 */
class RecaptchaFieldTypeModifier extends FieldTypeModifier
{

    /**
     * Modify the value.
     *
     * @param $value
     * @return null|string
     */
    public function modify($value)
    {
        $value = '<code>' . \Request::ip() . '</code> | <small>' . Carbon::now() .'</small>';
        if ($value && !$this->validate($value)) {
            $value = NULL;
        }

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
        if ($value && !$this->validate($value)) {
            $value = null;
        }

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
    protected function validate($value)
    {
        return true;
    }
}
