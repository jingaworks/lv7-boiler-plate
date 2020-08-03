<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Str;
use \DateTimeInterface;

class Product extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'products';

    protected $appends = [
        'images',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price_starts',
        'price_ends',
        'category_id',
        'subcategory_id',
        'region_id',
        'place_id',
        'created_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImagesAttribute()
    {
        $files = $this->getMedia('images');
        $files->each(function ($item) {
            unset($item->mime_type);
            unset($item->collection_name);
            unset($item->created_at);
            unset($item->updated_at);
            unset($item->manipulations);
            unset($item->order_column);
            unset($item->custom_properties);
            unset($item->size);
            unset($item->model_id);
            unset($item->responsive_images);
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
            unset($item->name);
            // unset($item->file_name);
            // unset($item->disk);
            // unset($item->model_type);
        });

        return $files;
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = Str::title(Str::lower($value));
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select(['id', 'name']);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id')->select(['id', 'name']);
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id')->select(['id', 'denj', 'mnemonic']);
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id')->select(['id', 'denloc', 'region_id']);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id')->select(['id', 'name', 'phone', 'email']);
    }

    public function atestat()
    {
        return $this->hasManyThrough(
            Atestat::class,
            User::class,
            'id', // Foreign key on Users table...
            'created_by_id', // Foreign key on Atestat table...
            'created_by_id', // Local key on Atestats table...
            'id' // Local key on Users table...
        )->with(['serie', 'region', 'place']);
    }
}