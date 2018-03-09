<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    private $date_format = 'd M Y H:i';

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function getStatusLabelAttribute()
    {
        return $this->status ? 
            '<span class="badge badge-success">Confirmed!</span>' : 
            '<span class="badge badge-danger">Unconfirmed!</span>';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)
            ->format($this->date_format);
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)
            ->format($this->date_format);
    }
}