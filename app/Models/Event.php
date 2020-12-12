<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events'; // you may change this to your name table
    public $timestamps = false; // set true if you are using created_at and updated_at
    protected $primaryKey = 'id'; // the default is id

    protected $fillable = ['titre','debut','fin'];
}
