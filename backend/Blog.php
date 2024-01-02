<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\MediaLibrary\MediaInterface;
use App\MediaLibrary\MediaTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Blog extends Model implements MediaInterface
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    use MediaTrait;
    use LogsActivity;

    protected $fillable = [
        'title',
        'meta_title',
        'meta_desc',
        'head_scripts',
        'slug',
        'content',
        'published',
        'featured_img',
        'featured',
        'created_at',
        'excerpt',
        'toc',
        'category_id',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $time = now()->format('Y-m-d h:i:s a');

        return LogOptions::defaults()
            ->logOnly(
                [
                    'id',
                    'created_at',
                    'updated_at',
                    'title',
                    'meta_title',
                    'meta_desc',
                    'head_scripts',
                    'slug',
                    'content',
                    'published',
                    'featured',
                    'excerpt',
                    'toc',
                    'category_id',
                ]
            )
            ->useLogName('blog')
            ->setDescriptionForEvent(fn(string $eventName) => "Blog {$eventName} at {$time}");
    }

    protected $casts = [
        'toc' => 'array',
    ];

    protected $attributes = [
        'toc' => '[]',
    ];

    protected $appends = [
        'permalink',
        'readDuration',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getExcerptAttribute($value)
    {
        $output = $value;

        if ($value === null) {
            $content = strip_tags($this->content);

            $output = Str::words($content, 50, '');
        }

        return $output;
    }

    public function getPermalinkAttribute()
    {
        return route('blog.single', $this->slug);
    }

    public function getReadDurationAttribute()
    {
        if (is_null($this->content)) {
            return null;
        }
        else {
            $est = Str::readDuration($this->content);

            $time = $est > 1 ? 'mins' : 'min';

            $output = "{$est} {$time} read";

            return $output;
        }
    }

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('featured')
    //         ->singleFile();
    // }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
