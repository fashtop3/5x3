<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Receipt extends Model
{
    use CrudTrait;

    protected $fillable = ['user_id', 'upload', 'confirm'];


    public function user()
    {
        return $this->belongsTo('App\User');//->withTrashed();
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public function getConfirmedAttribute()
    {
        return $this->status ? "Confirmed" : "Pending";
    }

    public function getAdminReceiptWithLink()
    {
        if($this->upload)
            return  '<a href="'. route('receipt.view', ['id'=>$this->id]) .'" target="_blank">View Receipt</a>';

        return 'No Upload Yet';
    }
}
