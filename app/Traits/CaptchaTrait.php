<?php namespace App\Traits;
 
use Input;
use ReCaptcha\ReCaptcha;
 
trait CaptchaTrait {
    protected $secret = env('RE_CAP_SECRET');
    public function captchaCheck()
    {
 
        $response = Input::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = $this->secret;
 
        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }
 
    }
 
}