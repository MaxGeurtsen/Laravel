<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\votes
 *
 * @property int $id
 * @property int $question_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|votes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|votes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|votes query()
 * @method static \Illuminate\Database\Eloquent\Builder|votes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|votes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|votes whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|votes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|votes whereUserId($value)
 * @mixin \Eloquent
 */
class votes extends Model
{
    public $fillable = ['question_id','user_id'];
}
