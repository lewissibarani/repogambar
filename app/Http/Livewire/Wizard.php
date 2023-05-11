<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use App\Models\Gambar;
use App\Models\File;
use App\Models\Kategori_File;
use App\Models\Source;
use App\Models\TugasReview;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;   
use Image;
  
class Wizard extends Component
{
    use WithFileUploads; 
    public $currentStep = 1;
    public $judul,$image,$imagename,$imagepath,$file,$Jenisfile,$kegunaan;
    public $successMessage = '';
    public $jenisfile="";
    public $sumber=3;
    public $sumbernama="Badan Pusat Statistik";
    public $jenisfilenama="Fotografi";
    public $pembuatkarya="";
    public $tags=[];
  
    protected $messages = [
        'image.max' => 'File terlalu besar.',
        'image.image' => 'File yang diterima hanyalah jpg,jpeg, atau png.',
        'judul.required' => 'Isian ini harus diisi.',
        'image.required' => 'Isian ini harus diisi.',
    ];
  

    /**
     * Write code on Method
     *
     * @return response()
     */
 

    public function render()
    {  
        $this->pembuatkarya =  User::where('id',Auth::id())->first();
        $this->Jenisfile =  Kategori_File::all();  
        $this->sumberlist =  Source::all();  
        return view('livewire.wizard') ;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */

    private function convertArray($array)
    {
        $converted_array=array();
        foreach(json_decode($array, true) as $key=> $data )
        {
            array_push($converted_array,$data['value']);
        }
        return $converted_array;
    }

    public function firstStepSubmit()
    { 
        $validatedData = $this->validate([
            'judul' => 'required', 
            'image' => 'required|image|max:30000|mimes:jpg,jpeg,png',  
        ]); 
   
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
         
        $validatedData = $this->validate([   
            'tags' => 'required',
        ]);

        $this->currentStep = 3;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        $fileid=null;

        try {
            $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();  

            // $this->createThumbnail($storagePath.'public/uploadedGambar/'.$gambar_name, $storagePath.'public/thumbnail/'.$gambar_name, 1000);
            
            //constant
            $image =  $this->image;
            $nameImage =  date('YmdHi').$this->image->getClientOriginalName();
        
            //membuat thumbnail
            $width = config('imageresize.size.width'); // your max width
            $height =  config('imageresize.size.height'); // your max height
            $thumbPath = $storagePath.'public/thumbnail/'.$nameImage; 
            $thumbImage = Image::make($image->getRealPath());
            $thumbImage->height() > $thumbImage->width() ? $width=null : $height=null;
            $thumbImage->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath); 
            
            //menyimpan gambar original
            $oriPath = $storagePath.'public/uploadedGambar/'.$nameImage;
            $oriImage = Image::make($image)->save($oriPath); 
             
            // get ukuran dan ekstension gambar
            $tipe_gambar=\File::extension(Storage::url('public/uploadedGambar/'.$nameImage));
            $gambar_size=Storage::size('public/uploadedGambar/'.$nameImage);

        } catch (Throwable $e) {
            report($e);
     
            return false;
        }

        if($this->file)
        {
            try {
                $file_name=date('YmdHi').$this->file->getClientOriginalName();
                $file_name = str_replace(Array("\n", "\r", "\n\r"), '', $file_name); 
                $this->file->storeAs('/public/file',$file_name);    
                $filezip =File::create([
                    'path' => 'storage/file/'.$file_name,
                    'nama_file' => $file_name,
                    'size' => Storage::size('public/file/'.$file_name),  
                    'type' => \File::extension(Storage::url('public/file/'.$file_name)), 
                    'download'=>0
                    ]);
        
                $fileid=$filezip->id;
    
            } catch (Throwable $e) {
                report($e);
         
                return false;
            }
        }
        
        $creategambar= Gambar::create([
            'judul' => $this->judul,
            'nama_gambar' =>$nameImage,
            'link' => $oriPath,
            'path' =>'storage/uploadedGambar/'.$nameImage,
            'thumbnail_path' =>'storage/thumbnail/'.$nameImage,
            'idKegunaan' =>"Upload Personal",
            'idUser' =>Auth::id(),
            'ukuran' =>$gambar_size,
            'source_id' => $this->sumber,
            'file_id' => $fileid,  
            'kategori_file'=>$this->jenisfile,
            'tipe_gambar' => $tipe_gambar,
            'views' => 0,
            'download'=>0,
            'booleantayang'=>0,
        ]);

        //menyimpan tags
        $creategambar->tag($this->convertArray($this->tags));

        //membuat seolah olah pengupload melakukan permintaan
        $idtransaksi  = $this->createpermintaan($creategambar->id,Auth::id(),$this->judul,$oriPath); 

        //membuat task review untuk petugas
        $this->createreview($creategambar->id,$idtransaksi);

        //menambah 1 statistik upload user
        $this->statuploaduser(Auth::id());

        $this->clearform();

        $this->successMessage = 'Karya berhasil diupload dan akan direview oleh tim kami. Kami akan memberitahu kamu jika karya kamu layak tayang';  
        
        $this->currentStep = 1;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->judul = '';
        $this->file = '';
        $this->image="";
        $this->jenisfile="";
        $this->sumber=3;
        $this->sumbernama="Badan Pusat Statistik";
        $this->jenisfilenama="Fotografi";
        $this->tags=[];

    } 

    public function createreview($gambarid,$idtransaksi) 
    {
        $tugasreview= new TugasReview; 
        $tugasreview->petugasid=null; 
        $tugasreview->transaksiid=$idtransaksi;
        $tugasreview->save();
    }  
 
    public function createpermintaan($gambarid,$idpengupload,$judulpermintaan,$link) 
    {
        //---start proses pemberian id permintaan
        $kodesatker = Auth::user()->kodesatker;
        $digiterakhir_idpermintaan= $this->pemberian_id_permintaan($kodesatker);
        $id_permintaan = $kodesatker.$digiterakhir_idpermintaan; 

        $permintaan= new Transaksi;
        $permintaan->jenispermintaanid = 2;
        $permintaan->judulPermintaan = $judulpermintaan;
        $permintaan->idStatus = 7;
        $permintaan->idKegunaan = 4;
        $permintaan->alasanDitolak = null; 
        $permintaan->linkPermintaan = $link; 
        $permintaan->idUserPeminta = $idpengupload; 
        $permintaan->gambar_id = $gambarid; 
        $permintaan->id_permintaan = $id_permintaan; 
        $permintaan->kegunaan_lainnya = "null"; 
        $permintaan->save(); 
        return $permintaan->id;
    } 

    public function statuploaduser ($iduser) {
        $user = User::find($iduser);
        $user->increment('sum_upload'); 
        $user->save();
    }

    private function pemberian_id_permintaan($kodesatker)
    {   
        $lastnumber=0;
        $permintaan = Transaksi::where(DB::raw('substr(id_permintaan, 1, 12)'), '=' , $kodesatker)->latest("id")->first();
        if($permintaan!=null)
        {
            $lastnumber_2 = $permintaan->id_permintaan;
            $sisa_digit_terakhir = substr($lastnumber_2, 12);
            $lastnumber = $sisa_digit_terakhir +1;
        }

        return $lastnumber;
    }
  
}