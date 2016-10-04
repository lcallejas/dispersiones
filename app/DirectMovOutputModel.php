<?php

namespace Dispersiones;

use Illuminate\Database\Eloquent\Model;

class DirectMovOutputModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'directmov_output';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['directmov_output_no','directmov_output_company','directmov_output_type','directmov_output_rode','directmov_output_disperser','directmov_output_origin','directmov_output_destiny','directmov_output_comment'];
}
