<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $amount
 * @property int $productId
 * @property string $regDate
 * @property Product $product
 */
class Price extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'price';
    //Primary Key
    public $primarykey = "id";
    // No Timestamps
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['amount', 'productId', 'regDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'productId');
    }
}
