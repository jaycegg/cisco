<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salle;

class Campus extends Model
{
    protected $table = 'campuses';
    protected $primaryKey = 'id';

    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ville',
        'pays',
    ];
    
    public function salle(){
        return $this->belongsTo(Salle::class);
    }
}
