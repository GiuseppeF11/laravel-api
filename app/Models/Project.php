<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'type_id',
        'cover_img',
    ];

    protected $appends = ['full_cover_img'];

    public function getFullCoverImgAttribute() {
        if ($this->cover_img) { //Se esiste cove_img 
            return asset('storage/'.$this->cover_img);
        } 
        else {
            return null;
        }
    }

    /* 
        Definisco la relazione 1 a *
    */

    public function type()
    {
        return $this->belongsTo(Type::class); //Tabella dipendente (*)
    }

    // Definisco la relazione many to many
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
