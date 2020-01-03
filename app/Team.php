<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    public $table = 'teams';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function teamUsers()
    {
        return $this->hasMany(User::class, 'team_id', 'id');
    }

    public function teamCompanies()
    {
        return $this->hasMany(Company::class, 'team_id', 'id');
    }

    public function teamTerritorioVecis()
    {
        return $this->hasMany(TerritorioVeci::class, 'team_id', 'id');
    }

    public function teamCategoriesTypes()
    {
        return $this->hasMany(CategoriesType::class, 'team_id', 'id');
    }

    public function teamCategoriesItems()
    {
        return $this->hasMany(CategoriesItem::class, 'team_id', 'id');
    }

    public function teamCities()
    {
        return $this->hasMany(City::class, 'team_id', 'id');
    }

    public function teamCentrosEducativos()
    {
        return $this->hasMany(CentrosEducativo::class, 'team_id', 'id');
    }
}
