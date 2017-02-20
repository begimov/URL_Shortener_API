<?php

namespace Aideus\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $fillable = [
      'url',
      'code'
    ];
}
