<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\questions
 *
 * @property int $id
 * @property string $question
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|questions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|questions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|questions query()
 * @method static \Illuminate\Database\Eloquent\Builder|questions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|questions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|questions whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|questions whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class questions extends Model
{
    public $fillable = ['question'];


}
