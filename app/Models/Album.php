<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Gambar;

class Album extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
    protected $table = 'album';
    protected $fillable = [
        'judulalbum',
        'albumparentid',
        'deskripsi',
        'creatorid',  
    ];

    public function gambar ()
    { 
        return $this->hasMany(Gambar::class,'album_id', 'id');
    }

    public function children(){ 
        return $this->hasMany(self::class , 'albumparentid');
    }
    
    public function parents(){
        return $this->belongsTo(self::class , 'id');
    }

    public function user ()
    {
        return $this->hasOne('App\Models\User','id','creatorid');
    }
}