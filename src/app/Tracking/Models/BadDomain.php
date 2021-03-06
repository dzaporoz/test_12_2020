<?php

namespace App\Tracking\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class BadDomain extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "name",
    ];
}
