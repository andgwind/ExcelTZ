<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;

    protected $fillable = ['id_excel', 'name', 'date'];

    public function setDateAttribute($value)
    {
        $value = Carbon::createFromFormat('d.m.y', $value);
        $this->attributes['date'] = $value;
    }
}
