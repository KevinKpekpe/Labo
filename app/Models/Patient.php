<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bonlabos()
    {
        return $this->hasMany(BonLabo::class);
    }
    public function factures(){
        return $this->hasMany(Facture::class);
    }
}
