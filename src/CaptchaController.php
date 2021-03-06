<?php

namespace Masoud5070\Captcha;

use Exception;
use Illuminate\Routing\Controller;

/**
 * Class CaptchaController
 * @package Masoud5070\Captcha
 */
class CaptchaController extends Controller
{
    /**
     * get CAPTCHA
     *
     * @param Captcha $captcha
     * @param string $config
     * @return array|mixed
     * @throws Exception
     */
    public function getCaptcha(Captcha $captcha, string $config = 'default')
    {
        if (ob_get_contents()) {
            ob_clean();
        }

        return $captcha->create($config);
    }

    /**
     * get CAPTCHA api
     *
     * @param Captcha $captcha
     * @param string $config
     * @return array|mixed
     * @throws Exception
     */
    public function getCaptchaApi(CaptchaRequest $request, Captcha $captcha)
    {
        $config = config('captcha.type.is_enabled') ? config('captcha.type.value') : 'default';

        return $captcha->create($config, true);
    }
}
