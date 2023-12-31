<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET')); //lấy mã CAPTCHA_SECRET trong file env
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']); //lấy địa chỉ source code
        return $response->isSuccess(); // nằm trong file vendor/google/recaptcha/src/Response
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Vui lòng hãy tích vào captcha để xác nhận bạn không phải là robot.';    //trả về thông báo khi lỗi không xác nhận captcha
        // return 'The validation error message.';
    }
}
