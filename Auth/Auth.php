<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Feather\Ignite\Auth;
use Feather\Init\Http\Session;
use Feather\Ignite\Models\User;
define('AUTH_USER','feather_auth_user');
/**
 * Description of Auth
 *
 * @author fcarbah
 */
class Auth {
    
    protected $user;
    
    private static $self;
    
    
    private function __construct() {
        $this->user = Session::get(AUTH_USER);
    }
    
    public static function getInstance(){
        
        if(self::$self == null){
            self::$self = new Auth();
        }
        
        return self::$self;
    }
    
    public static function login(array $credentials){
        
        $user = User::where($credentials)->find();
        
        if($user){
            Session::save($user, AUTH_USER);
            return $user;
        }
        
        return FALSE;
    }
    
    public function user(){
        return $this->user;
    }
    
    public function isLoggedIn(){
        return $this->user? true : false;
    }
    
    public function logOut(){
        Session::flush();
    }
    
}
