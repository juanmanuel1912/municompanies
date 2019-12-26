<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'cities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'team_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cityTerritorioVecis()
    {
        return $this->hasMany(TerritorioVeci::class, 'city_id', 'id');
    }

    public function ciudadCompanies()
    {
        return $this->hasMany(Company::class, 'ciudad_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
