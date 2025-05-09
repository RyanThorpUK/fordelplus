<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

trait HasUlid
{
    public static function bootHasUlid(): void
    {
        static::creating(function (Model $model) {
            if (! $model->ulid) {
                $model->ulid = (new Ulid())->toBase32();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'ulid';
    }
} 