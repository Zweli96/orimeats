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
 */
class SalesManager extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'salesmanager';
    //Primary Key
    public $primarykey = "id";
    // No Timestamps
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['firstname', 'surname', 'username', 'password', 'contact', 'regDate', 'status'];

}
