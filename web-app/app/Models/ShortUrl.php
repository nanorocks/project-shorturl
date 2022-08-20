<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $table = "short_urls";

    public const UUID = 'uuid';

    public const URL = 'url';

    public const USER_ID = 'user_id';

    protected $fillable = [
        self::UUID,
        self::URL
    ];
}
