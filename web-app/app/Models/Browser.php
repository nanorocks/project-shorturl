<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Browser extends Model
{
    use HasFactory;

    public const CLIENT_IP = 'client_ip';

    public const BROWSER_TYPE = 'browser_type';

    public const PLATFORM = 'platform';

    public const DEVICE = 'device';

    public const SHORTURL_ID = 'shorturl_id';

    protected $fillable = [
        self::CLIENT_IP,
        self::BROWSER_TYPE,
        self::PLATFORM,
        self::DEVICE,
        self::SHORTURL_ID
    ];


    protected $table = 'browsers';
}
