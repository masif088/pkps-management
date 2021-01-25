<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $distribution_id
 * @property integer $product_id
 * @property int $amount
 * @property string $created_at
 * @property string $updated_at
 * @property Distribution $distribution
 * @property Product $product
 */
class DetailDistribution extends Model
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
    protected $fillable = ['distribution_id', 'product_id', 'amount', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function distribution()
    {
        return $this->belongsTo('App\Models\Distribution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
