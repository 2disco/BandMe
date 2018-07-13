<?php

namespace Band;

use Illuminate\Database\Eloquent\Model;

class BandUser extends Model
{
    const ADMIN = 'ADMIN';
    const MEMBER = 'MEMBER';

    public $timestamps = false;
    protected $table = 'band_user';

    public function user()
    {
        return $this->belongsTo('Band\User');
    }

    public function band()
    {
        return $this->belongsTo('Band\Band');
    }

    protected $fillable = [
        'band_id', 'user_id', 'role',
    ];
}
