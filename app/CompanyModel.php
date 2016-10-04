<?php

namespace Dispersiones;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyModel extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'disperser'];
     
    public function scopeName($query, $name)
    {
        if (trim($name) != "") 
        {
            $query->where('name', 'LIKE', '%'.$name.'%');
        }
    }
    public static function information($id)
    {
        return CompanyModel::where('id','=',$id)->get();
    } 
}
