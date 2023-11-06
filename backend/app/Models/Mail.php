<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        "is_read" => "boolean",
        "sent" => 'datetime:Y-m-d H:i:s',
        "created" => 'datetime:Y-m-d H:i:s'
    ];

    protected $fillable = [
        "id_user_from",
        "id_user_to",
        "subject",
        "message",
        "is_read",
        "sent",
        "created",
    ];
}
