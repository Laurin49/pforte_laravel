<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'titel', 'subtitel', 'stichpunkte', 'beschreibung', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
