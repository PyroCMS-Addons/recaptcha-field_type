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
    public function handle($value)
    {
        //Log::info('Validating reCAPTCHA Form');

        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
            Log::info('Validating form:: ERROR - CAPATCHA Not detected. User may not have selected the Checkbox');
        }

        //Log::info('TOKEN:' . $captcha);

        
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

        if(json_decode($response->getBody())->success)
        {
            Log::info('reCAPTCHA Validate :: SUCCESS');
            return true;
        }

        Log::info('reCAPTCHA Validate :: ERROR');

        return false;

    }

}