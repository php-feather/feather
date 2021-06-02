<?php

use Feather\Ignite\AppContainer;

/**
 * Register variables to Container
 */
//get container instance
$container = AppContainer::getInstance();

/**
 * List of available validation rules
 * You can add your custom rules to the array
 * Custom Rules must extend \Feather\Security\Validation\Rules\Rule
 */
$validation_rules = [
    'afterdate' => Feather\Security\Validation\Rules\AfterDate::class,
    'alpha' => \Feather\Security\Validation\Rules\Alpha::class,
    'alphanumeric' => Feather\Security\Validation\Rules\AlphaNumeric::class,
    'arraycount' => Feather\Security\Validation\Rules\ArrayCount::class,
    'beforedate' => \Feather\Security\Validation\Rules\BeforeDate::class,
    'date' => Feather\Security\Validation\Rules\Date::class,
    'email' => Feather\Security\Validation\Rules\Email::class,
    'exactlength' => \Feather\Security\Validation\Rules\ExactLength::class,
    'isarray' => \Feather\Security\Validation\Rules\IsArray::class,
    'maxlength' => \Feather\Security\Validation\Rules\MaxLength::class,
    'minlength' => Feather\Security\Validation\Rules\MinLength::class,
    'numeric' => Feather\Security\Validation\Rules\Numeric::class,
    'regex' => Feather\Security\Validation\Rules\Regex::class,
    'required' => Feather\Security\Validation\Rules\Required::class,
    'requiredif' => \Feather\Security\Validation\Rules\RequiredIf::class,
    'same' => Feather\Security\Validation\Rules\Same::class,
    'text' => Feather\Security\Validation\Rules\Text::class,
];

$container->add('validationRules', $validation_rules);

$container->register('validator', function($validationRules) {
    $validator = Feather\Security\Validation\Validator::getInstance();
    $validator->boot($validationRules);
    return $validator;
});
