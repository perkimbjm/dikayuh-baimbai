<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ContentPage extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'content_pages';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'no',
        'year',
        'title',
        'content_categories_id',
        'page_text',
        'excerpt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function categories()
    {
        return $this->belongsTo(ContentCategory::class, 'content_categories_id');
    }

    public function tags()
    {
        return $this->belongsToMany(ContentTag::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function download()
    {
        return DB::table('content_pages')
            ->where('content_pages.deleted_at', '=', null)
            ->join('content_categories', 'content_categories.id', '=', 'content_pages.content_categories_id')
            ->select('content_pages.no', 'content_pages.year', 'content_pages.title', 'content_pages.excerpt', 'content_categories.name as name')
            ->get();
    }
}
