<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\categories
 *
 * @property int $id
 * @property string $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|categories query()
 * @method static \Illuminate\Database\Eloquent\Builder|categories whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categories whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\posts[] $posts
 * @property-read int|null $posts_count
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|categories whereActive($value)
 */
class categories extends Model
{
    public $fillable = ['category','active'];

    public function posts()
    {
        return $this->hasMany(posts::class);
    }
}
