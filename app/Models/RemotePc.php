<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RemotePc extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'anydesk'    => 'AnyDesk',
        'teamviewer' => 'TeamViewer',
        'rdp'        => 'RDP',
        'vnc'        => 'VNC',
        'other'      => 'Other',
    ];

    public $table = 'remote_pcs';

    protected $hidden = [
        'rpassword',
        'lpassword',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'rid',
        'rpassword',
        'login',
        'lpassword',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
