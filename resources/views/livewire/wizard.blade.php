 <div>
   
@if(!empty($successMessage))
<div class="alert alert-success">
   {{ $successMessage }}
</div>
@endif
  
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? ' btn-light' : 'btn-primary' }}">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? ' btn-light' : 'btn-primary' }}">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? ' btn-light' : 'btn-primary' }}" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
  
    <div class="row setup-content card  {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1" style="padding:20px">
        <div class="col-xs-12">
            <div class="col-md-12"> 
            {{-- <div x-data x-init="alert('asjacjad')"></div> --}}
                <div class="row">   
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label >Judul Karya</label> 
                            <input type="text" wire:model="judul" class="form-control mb-3"  >
                            @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> 
                        <div class="form-group mt-3">  
                            <div x-data="{isUploading:true,progress:0}"
                                 x-on:livewire-upload-start="isUploading=true"
                                 x-on:livewire-upload-finish="isUploading=false"
                                 x-on:livewire-upload-error="isUploading=false"
                                 x-on:livewire-upload-progress="progress=$event.detail.progress"
                            > 
                                <label >Gambar</label> 
                                <input class="form-control"  type="file" wire:model="image"> 
                                <div wire:loading.grid wire:target="image">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center">Uploading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <div x-text="`${progress}%`" class=" cta-3 text-primary sh-5 d-flex align-items-center"></div>
                                        </div>
                                    </div> 
                                    <div class="row g-0">
                                        <div class="col mt-3">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                                x-bind:style="`width:${progress}%`"
                                                ></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror 
                                
                            </div>
                            <br/>
                            @if ($image)  
                                @if ($image->getMimeType()=="image/png"||
                                    $image->getMimeType()=="image/jpg" ||
                                    $image->getMimeType()=="image/jpeg")
                                <img class="card-img scale mb-3" src="{{ $image->temporaryUrl() }}"> 
                            @endif  
                            @endif  

                        </div>  
                    </div>
                    
                    <div class="col-sm-5">
                        <h5 class="card-title">Petunjuk Teknis</h5>
                    
                        <div class="mb-n2">
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        1
                                    </div>
                                </div>
                                <div class="col lh-1-25">
                                    Pada halaman ini, kamu diharuskan upload file jpg atau png yang mewakili karya kamu.
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                       2
                                    </div>
                                </div>
                                <div class="col lh-1-25">
                                    Gunakan gambar yang berdimensi dibawah 6000px panjang atau lebar dan ukuran file dibawah 30MB.
                                </div>
                            </div> 
                        </div>  
                    </div>
                </div>  
                <button class="btn btn-primary nextBtn btn-lg pull-right mt-3" wire:click="firstStepSubmit" type="button" >Next</button>  
            </div>
        </div>
    </div>
    <div class="row setup-content card {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2" style="padding:20px">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="row">  
                    <div class="col-sm-7"> 
                        <div class="form-group mt-3">
                            <label for="description">Jenis Karya (opsional)</label> 
                            <div wire:ignore>
                                <select id="select2Multiple" class="form-select" >
                                    <option selected>Fotografi</option>
                                    @foreach ($Jenisfile as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama_kategori }}</option> 
                                    @endforeach
                                </select> 
                                @error('Jenisfile') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>  
                        <div wire:ignore>
                            <div class="form-group mt-3"> 
                                <div    x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                                >
                                    <label for="description">Upload File (opsional)</label><br/>
                                    <input id="inputuploadfile" type="file" wire:model="file" class="form-control mb-3" disabled> 

                                    <!-- Progress Bar -->
                                    <div x-show="isUploading" wire:target="file"> 
                                            <div class="row g-0">
                                                <div class="col">
                                                    <div class="sh-5 d-flex align-items-center">Uploading...</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div x-text="`${progress}%`" class=" cta-3 text-primary sh-5 d-flex align-items-center"></div>
                                                </div>
                                            </div> 
                                            <div class="row g-0">
                                                <div class="col mt-3">
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                                        x-bind:style="`width:${progress}%`"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div> 
                                    </div> 
                                    @error('file') <span class="error">{{ $message }}</span> @enderror 
                                </div>
                            </div> 
                            @if ($file)  
                                <a href="{{ $file->temporaryUrl() }}"> Link file</a>
                            @endif 
                        </div> 
                        <div class="form-group mt-3">
                            <div wire:ignore>
                                <label for="description">Tags</label>
                                <input 
                                type="text"
                                id="tagsBasic" 
                                /> 
                                @error('tags') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div> 
                      
                        <div class="col-sm-5">
                            <h5 class="card-title">Petunjuk Teknis</h5>
                        
                            <div class="mb-n2">
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                            1
                                        </div>
                                    </div>
                                    <div class="col lh-1-25">
                                        Jika karya kamu hanya berupa foto, kamu tidak perlu melakukan upload file.
                                    </div>
                                </div>
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                           2
                                        </div>
                                    </div>
                                    <div class="col lh-1-25">
                                        Sesuaikan jenis file dengan karya yang kamu akan upload.
                                    </div>
                                </div> 
                                <div class="row g-0 mb-2">
                                    <div class="col-auto">
                                        <div class="sw-3 me-1">
                                           3
                                        </div> 
                                    </div>
                                    <div class="col lh-1-25">
                                        Tuliskan minimal 3 tags yang sesuai dengan karya kamu. Gunakan tanda koma (,) atau spasi sebagai pemisah tag.
                                    </div>
                                </div> 
                            </div>  
                        </div> 
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button> 
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row setup-content card {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3" style="padding:20px">
        <div class="col-xs-12">
            <div class="col-md-12"> 
                <div class="row">  
                    <h3 class="display">Preview Karya</h3>
                    <div class="col-sm-7">
                        <table class="table table-borderless mb-3">
                            <tr>
                                <td>Judul Gambar</td>
                                <td>:</td>
                                <td><strong>{{$judul}}</strong></td>
                            </tr>  
                            <tr>
                                <td>Penyumbang Karya</td>
                                <td>:</td>
                                <td><strong>{{$pembuatkarya->name}}</strong></td>
                            </tr>
                            <tr>
                                <td>Jenis File</td>
                                <td>:</td>
                                <td><strong>{{$jenisfilenama}}</strong> </td>
                            </tr>  
                            <tr>
                                <td>Nama File</td>
                                <td>:</td>
                                <td>@if ($file)  <a href="{{$file->temporaryUrl()}}"><i data-acorn-icon="file"></i> File Terlampir </a>  @endif</td>
                            </tr> 
                            <tr>
                                <td>Tags</td>  
                                <td>:</td>
                                <td> @if ($tags) 
                                        @foreach(json_decode($tags) as $tag)
                                        <div class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1" >
                                            <span>{{$tag->value}}</span>
                                        </div>
                                        @endforeach
                                    @endif
                                </td> 


                            </tr>
                        </table>
        
                        <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Publikasikan!</button>
                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Kembali</button> 
                    </div>
                    <div class="col-sm-5">
                       
                        @if ($image) <img class="card-img scale mb-3" src="{{ $image->temporaryUrl() }}">  @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts') 
    <script type="text/javascript">
    
        $(document).ready(function () {   
            
            
            $('#select2Multiple').select2();
            $('#select2Multiple').on('change', function (e) {
                var data = $('#select2Multiple').select2("val");
                var datanama = $('#select2Multiple option:selected').text();
            @this.set('jenisfile', data);
            @this.set('jenisfilenama', datanama);
            if(data>=1)
            {
                $("#inputuploadfile").prop('disabled', false);  
            }else{
                var uploadedFilename =  $('#inputuploadfile').val().replace(/C:\\fakepath\\/i, '');  
                $("#inputuploadfile").prop('disabled', true);  
                $("#inputuploadfile").val('');  
                @this.removeUpload('file', uploadedFilename, "Berhasil ");
                console.log("Berhasil Remove File");
            } 
            });
 
            $('#tagsBasic').on('change', function (e) {
                var data = $('#tagsBasic').val();  
                // console.log(data) 
            @this.set('tags', data);
            });


            $('#inputuploadfile').change(function(){ 
                var uploadedFilename =  $('#inputuploadfile').val().replace(/C:\\fakepath\\/i, ''); 
                let file = document.querySelector('#inputuploadfile').files[0]; 

                // Upload a file:
                @this.upload('file', file, (uploadedFilename) => {
                    // Success callback. 
                }, () => {
                    // Error callback. 
                }, (event) => {
                    console.log(event.detail.progress); 
                   
                });   
                 
            });

            // let file = document.querySelector('input[type="file"]').files[0]

            // // Upload a file:
            // @this.upload('file', file, (uploadedFilename) => {
            //     // Success callback.
            //     console.log("Sukses");
            // }, () => {
            //     // Error callback.
            //     console.log("Gagal");
            // }, (event) => {
            //     // Progress callback.
            //     // event.detail.progress contains a number between 1 and 100 as the upload progresses.
            // });  
        });
    </script> 
@endpush 

