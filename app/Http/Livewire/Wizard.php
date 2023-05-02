<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use App\Models\Gambar;
use App\Models\Kategori_File;
use App\Models\Source;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator; 
  
class Wizard extends Component
{
    use WithFileUploads; 
    public $currentStep = 1;
    public $judul,$image,$imagename,$imagepath,$file,$Jenisfile,$kegunaan;
    public $successMessage = '';
    public $jenisfile=1;
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
            $gambar_name=date('YmdHi').$this->image->getClientOriginalName(); 
            $this->image->storeAs('/public/uploadedGambar', $gambar_name); 
            $this->createThumbnail($storagePath.'public/uploadedGambar/'.$gambar_name, $storagePath.'public/thumbnail/'.$gambar_name, 1000);
            $tipe_gambar=\File::extension(Storage::url('public/uploadedGambar/'.$gambar_name));
            $gambar_size=Storage::size('public/uploadedGambar/'.$gambar_name);
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
                    'kategori_file'=>$this->$sumber,
                    'download'=>0
                    ]);
        
                $fileid=$filezip->id;
    
            } catch (Throwable $e) {
                report($e);
         
                return false;
            }
        }
       
        Gambar::create([
            'judul' => $this->judul,
            'nama_gambar' =>$gambar_name,
            'link' => "nolink",
            'path' =>'storage/uploadedGambar/'.$gambar_name,
            'thumbnail_path' =>'storage/thumbnail/'.$gambar_name,
            'idKegunaan' =>"Upload Personal",
            'idUser' =>Auth::id(),
            'ukuran' =>$gambar_size,
            'source_id' => 3,
            'file_id' => $fileid,  
            'tipe_gambar' => $tipe_gambar,
            'views' => 0,
            'download'=>0,
            'booleantayang'=>1,
        ]);
  
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

    } 

    public function createThumbnail($src, $dest, $desired_width) 
    {
 
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    } 
 
 
}