<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static truncate()
 */
class LoginHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'login_at',
        'ip'
    ];

    /**
     * @return belongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
