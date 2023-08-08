<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bonlabo()
    {
        return $this->belongsTo(BonLabo::class);
    }

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}
