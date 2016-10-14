<?php

namespace codeCommerce;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address_cep',
        'address_location',
        'address_number',
        'address_neighborhood',
        'address_city',
        'address_state',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders() {

        return $this->hasMany('codeCommerce\Order');
    }

}
