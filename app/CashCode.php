<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashCode extends Model
{

	use SoftDeletes;

    protected $fillable = ['price', 'code', 'deleted_at',];

	protected $dates = ['deleted_at'];

}
