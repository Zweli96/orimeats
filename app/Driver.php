<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $firstname
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property string $contact
 * @property string $regDate
 * @property int $status
 * @property Deliverydetail[] $deliverydetails
 */
class Driver extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'driver';
    //Primary Key
    public $primarykey = "id";
    // No Timestamps
    public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['firstname', 'surname', 'username', 'password', 'contact', 'regDate', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliverydetails()
    {
        return $this->hasMany('App\Deliverydetail', 'driverId');
    }
}
