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
                            @if ($image) 
                                    Gambar Preview: 
                                <img class="card-img scale mb-3" src="{{ $image->temporaryUrl() }}"> 
                            @endif 
                            <div wire:loading wire:target="image">
                                <div class=" mb-3 spinner-border" style="width: 1rem; height: 1rem" role="status"></div>
                            </div>
                            <label >Gambar</label> 
                            <input class="form-control"  type="file" wire:model="image"> 
                            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                <label class="mb-3">Animated</label>
                                <div class="sw-13">
                                    <div role="progressbar" class="progress-bar-line" id="progressLineAnimated"></div>
                                </div>
                            </div>
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror 
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
                                    <option selected>Foto</option>
                                    @foreach ($Jenisfile as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama_kategori }}</option> 
                                    @endforeach
                                </select> 
                                @error('Jenisfile') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div wire:ignore>
                            <div class="form-group mt-3">
                                <label for="description">Upload File (opsional)</label><br/>
                                <input id="inputuploadfile" type="file" class="form-control mb-3"  disabled>
                                @error('file') <span class="error">{{ $message }}</span> @enderror
                            </div> 
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
                                        Tuliskan minimal 3 tang yang sesuai dengan karya kamu. Gunakan tanda koma (,) atau spasi sebagai pemisah tag.
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
                        <table class="table mb-3">
                            <tr>
                                <td>Judul Gambar:</td>
                                <td><strong>{{$judul}}</strong></td>
                            </tr>  
                            <tr>
                                <td>Penyumbang Karya:</td>
                                <td><strong>{{$pembuatkarya->name}}</strong></td>
                            </tr>
                            <tr>
                                <td>Jenis File:</td>
                                <td><strong>{{$jenisfile}}</strong> </td>
                            </tr>  
                            <tr>
                                <td>Nama File:</td>
                                <td>@if ($file)  <a href="{{$file->temporaryUrl()}}"><i data-acorn-icon="file"></i> File Terlampir </a>  @endif</td>
                            </tr> 
                            <tr>
                                <td>Tags:</td>  
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
            @this.set('jenisfile', data);
            if(data>=1)
            {
                $("#inputuploadfile").prop('disabled', false);  
            }else{
                $("#inputuploadfile").prop('disabled', true);  
                $("#inputuploadfile").val('');  
            } 
            });
 
            $('#tagsBasic').on('change', function (e) {
                var data = $('#tagsBasic').val();  
                // console.log(data) 
            @this.set('tags', data);
            });

            let file = document.querySelector('input[type="file"]').files[0]

            // Upload a file:
            @this.upload('file', file, (uploadedFilename) => {
                // Success callback.
                console.log("Sukses");
            }, () => {
                // Error callback.
                console.log("Gagal");
            }, (event) => {
                // Progress callback.
                // event.detail.progress contains a number between 1 and 100 as the upload progresses.
            });
  
            var pb = new ProgressBars.Line('#progressLineAnimated', {
                color: Globals.primary,
                trailColor: Globals.separator,
                val: 10,
                max: 100,
                duration: 500,
            }).animate(75 / 100); 
        });
    </script> 
@endpush 

