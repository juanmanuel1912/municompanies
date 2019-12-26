<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesType extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'categories_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'team_id',
        'rubro_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categoriesTypesCompanies()
    {
        return $this->hasMany(Company::class, 'categories_types_id', 'id');
    }

    public function rubro()
    {
        return $this->belongsTo(CategoriesItem::class, 'rubro_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
