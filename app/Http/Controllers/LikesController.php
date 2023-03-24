<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;

class LikesController extends Controller
{
    public function likePost($id)
    {
        $gambar = Gambar::find($id);
        if ($gambar->liked())
        {
            $this->unlikePost($id); 
        } else{
        $gambar->like();
        $gambar->save();
        } 
        return back()->with('message','Karya ini ditambahkan ke halaman yang kamu suka!');
    }

    public function unlikePost($id)
    {
        $gambar = Gambar::find($id);
        $gambar->unlike();
        $gambar->save();
        
        return redirect()->back()->with('message','Karya di ini ditanggalkan dari halamnan yang kamu suka!!');
    }
}
