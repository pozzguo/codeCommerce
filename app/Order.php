<?php

namespace codeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = [
        'user_id',
        'total',
        'status_id'
    ];

    public function items() {

        return $this->hasMany('codeCommerce\OrderItem');
    }

    public function status() {

        return $this->belongsTo('codeCommerce\Status');
    }

    public function user() {

        return $this->belongsTo('codeCommerce\User');
    }

}
