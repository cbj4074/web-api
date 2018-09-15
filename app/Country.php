<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function accounts()
    {
        return $this->hasMany(Account::class, 'country_code', 'code');
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class, 'country_code', 'code');
    }

    public function catalogEntities()
    {
        return $this->hasMany(CatalogEntity::class, 'country_code', 'code');
    }
}
