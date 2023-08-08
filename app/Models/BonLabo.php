<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonLabo extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'docteur_id',
        'date_prescription'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function docteur()
    {
        return $this->belongsTo(Docteur::class);
    }
    /**
     * Vérifie si un examen est associé au Bon.
     */
    public function hasExamen($examen_id)
    {
        foreach ($this->bonDetails as $bonlaboDetail) {
            if ($bonlaboDetail->examen_id == $examen_id) {
                return true;
            }
        }

        return false;
    }
    public function bonDetails()
    {
        return $this->hasMany(BonDetails::class);
    }
}
