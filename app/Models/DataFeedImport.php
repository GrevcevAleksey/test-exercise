<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFeedImport extends Model
{
    protected $table = 'data_feed_import';

    protected $fillable = [
        'external_id',
        'domain_id',
        'subject',
        'unisender_send_date_at',
    ];
}
