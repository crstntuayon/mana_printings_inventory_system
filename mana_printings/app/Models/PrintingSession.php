<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class PrintingSession extends Model
{
    //
    protected $table = 'printing_sessions';

    protected $fillable = [
        'customer_name',
        'job_description',
        'quantity',
        'printer_used',
        'printed_at'
    ];
}
