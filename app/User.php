<?php

namespace App;

use App\Console\Commands\PromoteUsers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this

    protected $payment;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'email', 'password' , 'payment',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function receipt()
    {
        return $this->hasOne('App\Receipt');
    }

    public function setDataAttribute($data)
    {
        return $this->attributes['data'] = json_encode($data);
    }

    public function getDataAttribute()
    {
        return json_decode($this->attributes['data']);
    }

    public function bank()
    {
        return Bank::find($this->data->bank_id);
    }

    public function downlines()
    {
        $steps = 0;
        return $this->totalDownlines($this, $steps, 4);
    }

    public function totalDownlines(&$user, &$steps, $loop)
    {
        if($loop == 0)
            return $steps;

        $DLUsers = function (User &$user) {
            return User::where(function ($query) use(&$user) {
                $query->where('upline_id', $user->id)
                    ->wherePayment(1)
                    ->whereNotIn('id', [1, $user->id]);
            })->get();
        };

        $dlUsers = $DLUsers($user);
        $steps += $dlUsers->count();
        foreach ($dlUsers as &$DLU) {
            $this->totalDownlines($DLU, $steps, $loop-1);
        }

        return $steps;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param mixed $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }


    public function getConfirmedAttribute()
    {
        return $this->payment ? $this->payment : $this->payment;
    }

}
