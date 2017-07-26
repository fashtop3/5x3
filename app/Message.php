<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Message extends Model
{
    use CrudTrait;
    //

    protected $fillable = ['title', 'body'];
}
