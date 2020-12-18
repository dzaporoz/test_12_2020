<?php

namespace App\Tracking\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * @mixin Builder
 */
class Click extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    public $table = "click";

    protected $fillable = [
        "ua",
        "ip",
        "ref",
        "param2",
        "param1",
        "error",
        "bad_domain"
    ];
}
