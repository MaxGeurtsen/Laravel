<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\users
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users query()
 * @method static \Illuminate\Database\Eloquent\Builder|users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $admin
 * @method static \Illuminate\Database\Eloquent\Builder|users whereAdmin($value)
 */
class users extends Model
{
    public $fillable = ['name','email','password'];


}
