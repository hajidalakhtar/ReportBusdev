<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    public function Report()
    {
        return $this->belongsTo('App\Report', 'report_id');
    }
}
