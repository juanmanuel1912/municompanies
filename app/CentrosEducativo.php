<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class CentrosEducativo extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'centros_educativos';

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

    const GESTION_SELECT = [
        'Publica' => 'Publica',
        'Privada' => 'Privada',
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

    const SUPERVISA_SELECT = [
        'DRE La Libertad' => 'DRE La Libertad',
        'UGEL 01'         => 'UGEL 01',
        'UGEL 02'         => 'UGEL 02',
        'UGEL 03'         => 'UGEL 03',
        'UGEL 04'         => 'UGEL 04',
        'UGEL'            => 'UGEL',
    ];

    const NIVEL_SELECT = [
        'Inicial'     => 'Inicial',
        'Primaria'    => 'Primaria',
        'Secundaria'  => 'Secundaria',
        'Universidad' => 'Universidad',
        'Instituto'   => 'Instituto',
        'Basica'      => 'Basica',
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
        'nivel',
        'email',
        'turno',
        'active',
        'team_id',
        'address',
        'website',
        'gestion',
        'cod_zip',
        'material',
        'telefono',
        'latitude',
        'supervisa',
        'reference',
        'encargado',
        'uso_local',
        'longitude',
        'ciudad_id',
        'num_float',
        'created_at',
        'telefono_2',
        'updated_at',
        'codcompany',
        'deleted_at',
        'date_index',
        'distrito_id',
        'description',
        'tipoempresa',
        'name_company',
        'cant_alumnos',
        'provincia_id',
        'float_company',
        'cant_docentes',
        'cant_secciones',
        'link_google_map',
        'departamento_id',
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

    public function departamento()
    {
        return $this->belongsTo(City::class, 'departamento_id');
    }

    public function provincia()
    {
        return $this->belongsTo(City::class, 'provincia_id');
    }

    public function distrito()
    {
        return $this->belongsTo(City::class, 'distrito_id');
    }
}
