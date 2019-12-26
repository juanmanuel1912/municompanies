<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesItem extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'categories_items';

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

    public function rubroCategoriesTypes()
    {
        return $this->hasMany(CategoriesType::class, 'rubro_id', 'id');
    }

    public function categoriesItemsCompanies()
    {
        return $this->hasMany(Company::class, 'categories_items_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
