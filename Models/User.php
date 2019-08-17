<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Feather\Ignite\Models;

/**
 * Description of User
 *
 * @author fcarbah
 */
class User extends Model{
    
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
