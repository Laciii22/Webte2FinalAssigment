<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable = ['question_code', 'selected_value']; // Update fillable fields

    // Define the relationship with Question
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_code', 'code');
    }
}