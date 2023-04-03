<div>
   
@if(!empty($successMessage))
<div class="alert alert-success">
   {{ $successMessage }}
</div>
@endif
  
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
  
    <div class="row setup-content card  {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1" style="padding:20px">
        <div class="col-xs-12">
            <div class="col-md-12"> 
                
                <div class="row">  
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-12 mt-5"> 
                                <div class="mb-3 filled">
                                    <i data-acorn-icon="edit"></i>
                                    <input type="text"  required class="input-judul" wire:model="judul" placeholder="Judul Karya..." />
                                    <small class="form-text text-muted">Sesuaikan judul dengan gambar</small>  
                                </div> 
                            </div>
        
                            <div class="col-sm-12 mt-5"> 
                                <div class="row">
                                    <div class="col-sm-12 col-form-label card no-shadow"> 
                                        <input type="file" class="form-control"  
                                        wire:model="image" 
                                        wire:submit.prevent="save"
                                        id="image_input"  /> 
                                    </div>   
                                    <div class="col-md-12 mb-2"> 
                                        <img class="card-img scale" id="preview-image-before-upload" hidden>
                                        <div class="container-image-preview">
                                                <div class ="drop-container"
                                                    alt="preview image">  
                                                    <div class="drop-title">Pratinjau Gambar</div>
                                                </div> 
                                        </div> 
                                    </div>
                                </div>  
                            </div> 
                        </div> 
                    </div>
                    
                    <div class="col-sm-5">
                        <h5 class="card-title">Petunjuk Teknis</h5>
                    
                        <div class="mb-n2">
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        <i data-acorn-icon="warning-circle" class="text-muted align-top" data-acorn-size="17"></i>
                                    </div>
                                </div>
                                <div class="col lh-1-25">
                                    Pada halaman ini, kamu diharuskan upload file jpg atau png yang mewakili karya kamu.
                                </div>
                            </div>
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <div class="sw-3 me-1">
                                        <i data-acorn-icon="warning-circle" class="text-muted align-top" data-acorn-size="17"></i>
                                    </div>
                                </div>
                                <div class="col lh-1-25">
                                    Gunakan gambar yang berdimensi dibawah 6000px panjang atau lebar dan ukuran file dibawah 30MB.
                                </div>
                            </div> 
                        </div>  
                    </div>
                </div>  
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Next</button> 
                <div wire:loading>
                    <div class="spinner-border" style="width: 1rem; height: 1rem" role="status"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row setup-content card {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2" style="padding:20px">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>
  
                <div class="form-group">
                    <label for="description">Product Status</label><br/>
                    <label class="radio-inline"><input type="radio" wire:model="status" value="1" {{{ $status == '1' ? "checked" : "" }}}> Active</label>
                    <label class="radio-inline"><input type="radio" wire:model="status" value="0" {{{ $status == '0' ? "checked" : "" }}}> DeActive</label>
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                </div>
  
                <div class="form-group">
                    <label for="description">Product Stock</label>
                    <input type="text" wire:model="stock" class="form-control" id="productAmount"/>
                    @error('stock') <span class="error">{{ $message }}</span> @enderror
                </div>
  
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
            </div>
        </div>
    </div>
    <div class="row setup-content card {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3" style="padding:20px">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
  
                <table class="table">
                    <tr>
                        <td>Product Name:</td>
                        <td><strong>{{$name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Amount:</td>
                        <td><strong>{{$amount}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product status:</td>
                        <td><strong>{{$status ? 'Active' : 'DeActive'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Description:</td>
                        <td><strong>{{$description}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Stock:</td>
                        <td><strong>{{$stock}}</strong></td>
                    </tr>
                </table>
  
                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
            </div>
        </div>
    </div>
</div>