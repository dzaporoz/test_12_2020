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

    /*
        generate new id during model creation
    */
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->id = Uuid::uuid4();
        });
    }
}
