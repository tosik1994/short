<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property string $redirect_to
 */
class Redirect extends Model
{
    protected $fillable = [
        'alias',
        'is_active',
        'redirect_to',
        'description',
    ];


    public function getRouteKeyName()
    {
        return 'alias';
    }

    public static function generateUniqueAlias(): string
    {
        do {
            $alias = Str::lower(Str::random(4));
        } while (self::where('alias', $alias)->exists());

        return $alias;
    }

}
