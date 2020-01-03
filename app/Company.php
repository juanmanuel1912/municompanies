<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Company extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'companies';

    protected $appends = [
        'pdf_map',
        'gallery',
    ];

    protected $dates = [
        'date_index',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const CARACTERISTICAS_SELECT = [
        'visible' => 'Es visible',
        'letrero' => 'Tiene letrero',
    ];

    const USO_LOCAL_SELECT = [
        'independiente' => 'independiente',
        'compartido'    => 'compartido',
    ];

    const TURNO_SELECT = [
        'morning'   => 'mañana',
        'afternoon' => 'tarde',
        'night'     => 'noche',
    ];

    const MATERIAL_SELECT = [
        'rustico' => 'Rustico',
        'noble'   => 'noble',
        'otro'    => 'otro material',
    ];

    const TIPOEMPRESA_SELECT = [
        'company_fisica'  => 'empresa fisica',
        'company_virtual' => 'empresa virtual',
    ];

    const CATEGORY_EMPRESA_RADIO = [
        '1start'    => '1 estrella',
        '2start'    => '2 estrella',
        '3start'    => '3 estrella',
        '4start'    => '4 estrella',
        '5start'    => '5 estrella',
        'not_start' => 'sin categoria',
    ];

    protected $fillable = [
        'email',
        'turno',
        'active',
        'team_id',
        'website',
        'cod_zip',
        'address',
        'latitude',
        'material',
        'telefono',
        'longitude',
        'ciudad_id',
        'uso_local',
        'reference',
        'num_float',
        'encargado',
        'telefono_2',
        'created_at',
        'updated_at',
        'codcompany',
        'deleted_at',
        'date_index',
        'description',
        'tipoempresa',
        'name_company',
        'float_company',
        'link_google_map',
        'caracteristicas',
        'category_empresa',
        'territorio_veci_id',
        'categories_types_id',
        'categories_items_id',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function ciudad()
    {
        return $this->belongsTo(City::class, 'ciudad_id');
    }

    public function territorio_veci()
    {
        return $this->belongsTo(TerritorioVeci::class, 'territorio_veci_id');
    }

    public function getDateIndexAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateIndexAttribute($value)
    {
        $this->attributes['date_index'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function categories_items()
    {
        return $this->belongsTo(CategoriesItem::class, 'categories_items_id');
    }

    public function categories_types()
    {
        return $this->belongsTo(CategoriesType::class, 'categories_types_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getPdfMapAttribute()
    {
        return $this->getMedia('pdf_map');
    }

    public function getGalleryAttribute()
    {
        $files = $this->getMedia('gallery');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }
}
