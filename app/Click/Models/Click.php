<?php

namespace App\Click\Models;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Click extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        "id",
        "ua",
        "ip",
        "ref",
        "param1",
        "param2",
        "error",
        "bad_domain"
    ];
}
