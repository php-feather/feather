<?php

namespace Feather\App\Models;

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
