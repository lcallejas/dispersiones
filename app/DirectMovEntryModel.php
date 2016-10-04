<?php

namespace Dispersiones;

use Illuminate\Database\Eloquent\Model;

class DirectMovEntryModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'directmov_entry';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['directmov_no','directmov_company','directmov_rode','directmov_bank','directmov_account'];
}
