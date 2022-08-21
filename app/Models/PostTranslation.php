<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
