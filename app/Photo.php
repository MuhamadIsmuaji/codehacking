<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];

    protected $upload_dir = '/images/';

    public function getFileAttribute($value) {
    	return $this->upload_dir.$value;
    }
}
