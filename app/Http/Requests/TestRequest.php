<?php

namespace Feather\App\Http\Requests;

/**
 * Description of TestRequest
 *
 * @author fcarbah
 */
class TestRequest extends Request
{

    protected $rules = [
        'name' => 'requiredif:{required:[age]}'
    ];
    protected $messages = [
        'name.requiredif' => 'Name is Required'
    ];

}
