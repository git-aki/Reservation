<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'date';

    protected $fillable = ['date', 'Executive', 'Deluxe', 'Superior', 'Standard'];
}
