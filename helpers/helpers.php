<?php

/**
 * Generates csrf Token
 * @return string
 */
function fa_csrf_token()
{
    $csrf = \Feather\App\Security\Csrf::getInstance();
    $token = $csrf->generateToken();
    return $token;
}

/**
 * Generates csrf Form Element
 * @return type
 */
function fa_csrf_token_input()
{
    $id = CSRF_ID;
    $token = fa_csrf_token();
    return <<<TOKEN
    <input type="hidden" name="$id" value="$token" />
TOKEN;
}

/**
 *
 * @param string $encryptedText
 * @return string
 * @throws RuntimeException
 */
function fa_decrypt($encryptedText)
{
    $key = get_env('APP_KEY');
    if (!$key) {
        throw new RuntimeException('Application key not found! Please');
    }
    return fs_decrypt($encryptedText, hex2bin($key));
}

/**
 *
 * @param mixed $value
 * @return string
 * @throws RuntimeException
 */
function fa_encrypt($value)
{
    $key = get_env('APP_KEY');
    if (!$key) {
        throw new RuntimeException('Application key not found! Please');
    }
    return fs_encrypt($value, hex2bin($key));
}
