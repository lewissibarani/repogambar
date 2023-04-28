<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use App\Models\Gambar;
use App\Models\Kategori_File;
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
    public $jenisfile="";
    public $jenisfilenama="";
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
         
        // $validatedData = $this->validate([ 
        //     'file' => 'mimes:zip,rar|file|max:30000', 
        // ]);
        if($this->file)
        {

        }
        $this->currentStep = 3;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        $this->image->storeAs('/public/uploadedGambar', ); 
        $this->file->storeAs('/public/file', ); 

        Gambar::create([
            'judul' => $this->judul,
            'link' => "nolink",
            'path' => "",
            'idKegunaan' =>"",
            'idUser' =>Auth::id(),
            'ukuran' =>Auth::id(),
            'file' => $this->file,
            'jenisfile' => $this->jenisfile,
        ]);
  
        $this->successMessage = 'Karya berhasil diupload dan akan direview oleh tim kami. Kami akan memberitahu kamu jika karya kamu layak tayang';  
        $this->reset(); 
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
 
 
}