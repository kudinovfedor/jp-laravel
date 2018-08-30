<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParseSites
 * @package App\Model
 *
 * @property-read \App\Model\SiteLinks $links
 */
class ParseSites extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'url',
        'domain',
    ];


    public function scopeProcessed()
    {
        return $this->links()->where('processed', true);
    }

    public function scopeNotProcessed()
    {
        return $this->links()->where('processed', false);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function links()
    {
        return $this->hasMany('App\Model\SiteLinks', 'site_id')->orderBy('path');
    }
}
