<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GambarView extends Model
{

    public function gambarView()
    {
        return $this->belongsTo(Gambar::class);
    }

    public static function createViewLog($gambar) {
        $gambarViews= new GambarView();
        $gambarViews->gambar_id = $gambar->id;
        $gambarViews->slug = Str::slug($gambar->judul);
        $gambarViews->url = request()->url();
        $gambarViews->session_id = request()->getSession()->getId();
        $gambarViews->user_id = (auth()->check())?auth()->id():null; 
        $gambarViews->ip = request()->ip();
        $gambarViews->agent = request()->header('User-Agent');
        $gambarViews->save();
    }
}
 