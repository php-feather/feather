<?php

use Feather\Security\Validation\Runtime;

/**
 * register your custom validation rules here. Rules must implement
 * \Feather\Security\Validation\Rules\IRule interface
 *
 */
$custom_validator_rules = [
        /*
         * \Feather\Security\Validation\Rules\Email::alias() => \Feather\Security\Validation\Rules\Email::class
         */
];

$vRuntime = Runtime::getInstance();

//load custom validation rules
$vRuntime->boot($custom_validator_rules);
