<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedQuestion extends Model
{
    use HasFactory;

    protected $table = 'archived_questions';

    protected $fillable = [
        'code',
        'title',
        'lesson',
        'user_id',
        'version',
        'closed_at',
        'created_at',
        'updated_at',
        'category',
    ];

    // Optionally, define any necessary relationships, like linking back to the original question
    public function originalQuestion()
    {
        return $this->belongsTo(Question::class, 'code', 'code');
    }
}