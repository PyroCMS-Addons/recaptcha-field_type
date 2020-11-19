<?php namespace Thrive\RecaptchaFieldType\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Thrive\RecaptchaFieldType\RecaptchaFieldType;
use GuzzleHttp\Client;

class ValidRecaptcha
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function handle(RecaptchaFieldType $fieldtype, $value)
    {

        Log::info('Start Validating reCAPTCHA');

        //
        // The field value must be present
        //
        if (empty($value)) {
            return false;
        }

        //
        // The field value must == 'pre_validation'
        //
        if($value != 'pre_validation') {
            return false;
        }

        //
        // POST MUST contain 'g-recaptcha-response'   
        //
        if(!isset($_POST['g-recaptcha-response'])){
            return false;
        }
   
        //
        // Google reCAPTCHA is present but not 
        // selected by user.
        //
        if (empty($_POST['g-recaptcha-response'])) {
            return false;
        }        

        // Log::info('Validating reCAPTCHA Form :: Passed Pre-Validation');

        //
        // Get the reCAPTCHA response
        //
        $captcha = $_POST['g-recaptcha-response'];


        Log::error('reCAPTCHA Token ' . $captcha);
        

        
        // Validate ReCaptcha
        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/'
        ]);

        $response = $client->post('siteverify', [
            'query' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                'response' => $captcha,
                'remoteip' => \Request::ip()
            ]
        ]);


        //Log::info('GOOGLE Response:' . $response->getBody());

        //
        // Store the "challenge_ts": "2020-11-19T01:29:25Z",
        // in the actual field
        //


        if(json_decode($response->getBody())->success)
        {
            //Log::info('reCAPTCHA Validate :: SUCCESS');
            return true;
        }


        Log::info('Google reCAPTCHA Validate :: FAILED [E31]');

        return false;

    }

}