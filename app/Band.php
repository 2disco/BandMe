<?php

namespace Band;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Band extends Model
{
    public function users()
    {
        return $this->belongsToMany('Band\User')->withPivot('role');
    }

    /**
     *
     * @param $userId
     * @return bool
     */
    public function isUserBandAdmin($userId){
        if(Auth::user()->isAdmin()){
            return true;
        } else {
            $band = $this;
            $_bandRole = BandUser::whereHas('band', function ($q) use ($band) {
                $q->where('id', $band->id);
            })->whereHas('user', function ($q) use ($userId) {
                $q->where('id', $userId);
            })->where('role', BandUser::ADMIN)->get()->first();
            if(is_a($_bandRole, '\Band\BandUser')){
                return true;
            } else {
                return false;
            }
        }
    }

    public function getSlugAttribute(): string
    {
        return str_slug($this->name);
    }

    public function getUrlAttribute(): string
    {
        return action('BandController@detail', [$this->id, $this->slug]);
    }
    protected $fillable = [
        'name', 'born', 'user_roles', 'bio', 'add_member','band_avatar',//'visibility','url_key',
    ];
}
