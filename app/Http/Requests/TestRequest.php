<?php

namespace Feather\App\Http\Requests;

/**
 * Description of TestRequest
 *
 * @author fcarbah
 */
class TestRequest extends Request
{

    //set up rules using rule format
    protected $rules = [
            //'name' => array('required', 'minlength:0'),
            //'email' => 'requiredif:{required:steve}'
    ];

    /** @var array * */
    protected $messages = [
        'name.required' => 'Name is Required',
        'name.minlength' => 'Name length must be greater than 0'
    ];

    public function __construct()
    {
        parent::__construct();
        //or alternatively manually set up rules like below
        //by overriding constructor and call parent construct
        //then set up rule as below
        $this->validationRules = [
                //'name.required' => new \Feather\Security\Validation\Rules\Required($this->post('name')),
                //'email.requiredif' => new \Feather\Security\Validation\Rules\RequiredIf($this->post('email'), new \Feather\Security\Validation\Rules\Required($this->post('name')))
        ];
    }

}
