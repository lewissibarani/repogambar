<div class="alert alert-info" role="alert">
    Hanya isikan kolom penolakan apabila ingin menolak permintaan ini.
</div>

<div class="row">
    <div class="col-12">
        <div class="card-body">
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="judul" /> 
                    <input type="hidden" class="form-control" id="" name="bagitugas_id"/>             
                </div>
            </div>
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Link</label>
                <div class="col-sm-10">
                <label class=" col-sm-12 col-form-label">
                    <span class="previewLink"></span>
                    <input type="hidden" class="form-control" name="link" />   
                </label>                  
                </div>
            </div>
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Tanggal Permintaan</label>
                <div class="col-sm-10">
                    <label class=" col-sm-12 col-form-label">
                        <span class="previewWaktu"></span>
                    </label>                  
                </div>
            </div>
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Penggunaan</label>
                <div class="col-sm-10">
                    <label class=" col-sm-12 col-form-label">
                        <span class="previewKegunaan"></span>
                        <input type="hidden" class="form-control" name="idKegunaan" />  
                    </label>               
                </div>
            </div>
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <label class=" col-sm-2 col-form-label">
                        <span class="previewStatus"></span>
                    </label>              
                </div>
            </div>

            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Source</label>
                <div class="col-sm-10">
                    <select class="form-select" name="source_id" id="select2Basic">
                        <option selected>Pilih...</option>
                        @foreach ($Source as $source)
                            <option value="{{ $source->id }}">{{ $source->sumber_gambar }}</option> 
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabel" class="font-weight-bold col-sm-2 col-form-label">Upload Gambar</label>
                <div class="col-sm-10">
                    <div class="col-sm-12 col-form-label card no-shadow mb-5">
                        <input type="file" class="form-control" name="image" />
                    </div>   
                </div>
            </div>
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Tags</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" data-role="tagsinput" name="tags">
                    <!-- <input class="form-control" type="text" data-role="tagsinput" name="tags"> -->
                    <!-- <input type="text" class="form-control" id="hashtags" onkeypress="return event.keyCode != 13;" autocomplete="off" >
                    <div class="tag-container"></div>                  -->
                </div>
            </div>
        </div>
    </div>
</div>
