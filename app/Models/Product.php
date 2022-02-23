<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;

    protected $guarded = [];
     
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function subsubcategory(){
        return $this->belongsTo('App\Models\SubSubCategory');
    }
}
