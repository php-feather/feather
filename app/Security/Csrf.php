<?php

namespace Feather\App\Security;

/**
 * Description of Csrf
 *
 * @author fcarbah
 */
class Csrf
{

    /** @var string * */
    protected $token;

    /** @var Csrf * */
    protected static $self;

    private function __construct()
    {
        ;
    }

    /**
     *
     * @return $this
     */
    public static function getInstance()
    {

        if (static::$self == null) {
            static::$self = new Csrf();
        }

        return static::$self;
    }

    /**
     *
     * @return string
     */
    public function generateToken()
    {
        if ($this->token == null) {
            $this->token = fs_csrf_token(CSRF_ID);
        }
        return $this->token->getValue();
    }

    /**
     *
     * @return void
     * @throws \RuntimeException
     */
    public function setHeader()
    {
        header(CSRF_HEADER . ': ' . $this->generateToken());
    }

}
