<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $piece
 * @property int $price
 * @property string $contents
 * @property string $photo
 * @property string $created_at
 * @property string $updated_at
 * @property DetailDistribution[] $detailDistributions
 */
class Product extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title', 'piece', 'price', 'contents', 'photo', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailDistributions()
    {
        return $this->hasMany('App\Models\DetailDistribution');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%')
                ->orWhere('price', 'like', '%'.$query.'%');
    }
}
