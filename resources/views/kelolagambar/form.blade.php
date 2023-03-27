<section class="scroll-section" id="labelSize">
    <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-3 col-form-label">Judul</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="colFormLabel" name="judulPermintaan" />
            <div id="passwordHelpBlock" class="form-text">
                Tuliskan judul gambar yang seuai dengan gambar yang diminta.
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-3 col-form-label">Link</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="colFormLabel" placeholder="Link Shuttertock atau Freepik..." name="linkPermintaan"/>
            <div id="passwordHelpBlock" class="form-text">
                Hanya bisa satu link gambar untuk satu permintaan.
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputState" class="col-sm-3 col-form-label">Jenis Penggunaan</label>
        <div class="col-sm-9">
            <select id="select2Multiple" class="form-select" name="idkegunaan" onchange="showDiv('hidden_div', this)">
                <option selected>Pilih...</option>
                @foreach ($Kegunaan as $kegunaan)
                    <option value="{{ $kegunaan->id }}">{{ $kegunaan->kegunaan }}</option> 
                @endforeach
            </select>
        </div>
    </div>
    <div id="hidden_div" style="display:none;">
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-3 col-form-label">Lainnya</label>
            <div class="col-sm-9">
                <textarea class="form-control" rows="4" id="colFormLabel" name="kegunaan_lainnya"></textarea>
            </div>
        </div>
    </div>
</section>
