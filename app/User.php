<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

    public function submit_proposal()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', 'SUBMIT PROPOSAL')->count();
    }
    public function site_survey()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', 'SITE SURVEY')->count();
    }
    public function BOQ()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', '%BOQ')->count();
    }
    public function PNL()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', 'PnL PROGRESS')->count();
    }
    public function pks()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count();
    }
    public function signed_pks()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', 'SIGNED PKS')->count();
    }
    public function roll()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', 'ROLL-OUT PROGRESS')->count();
    }
    public function ready()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', 'READY TO SELL')->count();
    }
    public function reject()
    {
        return Report::where('PIC_MNC', $this->name)->where('PROGRESS_STATUS', 'REJECT')->count();
    }
    use Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
