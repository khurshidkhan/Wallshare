<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //
    protected $table = 'photos';

    protected $fillable = array(
        'title','images');
    protected $timestamp = true;

    public static $upload_rules = array(
        'title' => 'required|min:3',
        'image' => 'required|image',
     );
}
