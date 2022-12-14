<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class income extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function categoryincome()
    {
        //thêm mối quan hệ
//        return $this->hasMany('App\Models\categoryIncome');
        return $this->belongsTo('App\Models\categoryIncome', 'categoryid');
    }
}
