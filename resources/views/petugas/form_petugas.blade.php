<div class="row">
    <div class="col-12">
        <div class="card-body">
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                <label class=" col-sm-12 col-form-label">
                    <span class="previewJudul"></span>
                </label>                  
                </div>
            </div>
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Link</label>
                <div class="col-sm-10">
                <label class=" col-sm-12 col-form-label">
                    <span class="previewLink"></span>
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

            <span class="previewAlasanTolak"></span>
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
                        <input type="file" class="form-control" id="inputGroupFile01" name="gambar" />
                    </div>   
                </div>
            </div>
            <div class="row mb-3">
                <label class="font-weight-bold col-sm-2 col-form-label">Tags</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="hashtags" onkeypress="return event.keyCode != 13;" autocomplete="off" >
                    <div class="tag-container"></div>                 
                </div>
            </div>
        </div>
    </div>
</div>
