<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gambar;
use App\Models\Kategori_File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
  
class Wizard extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $judul,$image,$imagename,$imagepath,$file,$Jenisfile,$kegunaan;
    public $successMessage = '';
    public $jenisfile="";
    public $pembuatkarya="";
    public $tags=[];
  
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
            'image' => 'required|image|max:30000', //30MB Max
        ]); 
   
        // $this->photo->store('image');
 
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
        //     'Jenisfile' => 'required', 
        // ]);
  
        $this->currentStep = 3;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        Gambar::create([
            'judul' => $this->judul,
            'link' => "nolink",
            'path' => "",
            'idKegunaan' =>"",
            
            'file' => $this->file,
            'jenisfile' => $this->jenisfile,
        ]);
  
        $this->successMessage = 'Product Created Successfully.';
  
        $this->clearForm();
  
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
        $this->name = '';
        $this->amount = '';
        $this->description = '';
        $this->stock = ''; 
    }
 
}