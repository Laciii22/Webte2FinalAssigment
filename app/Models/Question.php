<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'code'; // Specify the name of the primary key field

    protected $fillable = ['title', 'body', 'user_id', 'code', 'active', 'category'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = Str::random(5); // Generate a random 5-character code
        });
    }
}
