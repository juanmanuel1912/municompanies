<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TerritorioVeci extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'territorio_vecis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'city_id',
        'team_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function territorioVeciCompanies()
    {
        return $this->hasMany(Company::class, 'territorio_veci_id', 'id');
    }

    public function territorioVeciCentrosEducativos()
    {
        return $this->hasMany(CentrosEducativo::class, 'territorio_veci_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
