<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\users_posts
 *
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|users_posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users_posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users_posts query()
 * @method static \Illuminate\Database\Eloquent\Builder|users_posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users_posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users_posts wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users_posts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users_posts whereUserId($value)
 * @mixin \Eloquent
 */
class users_posts extends Model
{
    public $fillable = ['user_id','post_id'];
}
