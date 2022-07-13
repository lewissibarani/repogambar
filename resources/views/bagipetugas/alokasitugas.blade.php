<div class="row">
    <div class="col-12">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-10">
                <input type="hidden" class="idalokasipetugas" placeholder="Nama User" name="idalokasipetugas" />               
                </div>
            </div>
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
                <label for="colFormLabel" class="font-weight-bold col-sm-2 col-form-label">Alokasi</label>
                <div class="col-sm-10">
                    <select  id="select2Basic" class="form-select" name="user_id">
                        <option selected>Pilih...</option>
                        @foreach ($Users as $user)
                            <option value="{{ $user->id }}">{{ $user->name}}</option> 
                        @endforeach
                    </select>             
                </div>
            </div>
        </div>
    </div>
</div>
