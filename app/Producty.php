<?php

namespace codeCommerce;

use Illuminate\Database\Eloquent\Model;

class Producty extends Model
{
    protected $fillable = ['name','description','price'];
}
