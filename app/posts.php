<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\posts
 *
 * @property int $id
 * @property int $question_id_1
 * @property int $question_id_2
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|posts query()
 * @method static \Illuminate\Database\Eloquent\Builder|posts whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|posts whereQuestionId1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|posts whereQuestionId2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|posts whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property-read \App\categories $category
 * @method static \Illuminate\Database\Eloquent\Builder|posts whereUserId($value)
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|posts whereActive($value)
 * @property-read \App\questions $question1
 * @property-read \App\questions $question2
 * @property-read \App\User $user
 */
class posts extends Model
{
    public $fillable = ['question_id_1', 'question_id_2', 'category_id','user_id'];

    public function category()
    {
        return $this->belongsTo(categories::class);
    }

    public function questions($id)
    {
    $question = questions::whereId($id)
        ->first();

        return $question->question;
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
