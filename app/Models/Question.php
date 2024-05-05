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

    protected $fillable = ['title', 'user_id', 'code', 'active', 'category', 'closed_at', 'lesson',];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->code) {
                $model->code = Str::random(5); // Generate a random 5-character code
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
