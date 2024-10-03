<div class="modal fade show" id="lihatdetailadobepj{{$id_adobe_pj->id}}" tabindex="-1" role="dialog" aria-labelledby="scrollingModalLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollingModalLabel">Detail Ajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <section class="scroll-section" id="default">
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Pembuat Ajuan : </label>
                        <div class="col-sm-9 col-form-label">
                            {{$id_adobe_pj->getuser_pembuatajuan->name}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Satker : </label>
                        <div class="col-sm-9 col-form-label">
                            {{$id_adobe_pj->getuser_pembuatajuan->satker}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Email Semula : </label>
                        <div class="col-sm-9 col-form-label">
                            {{$id_adobe_pj->email_adobe_lama}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Email Pengganti : </label>
                        <div class="col-sm-9 col-form-label">
                            {{$id_adobe_pj->email_adobe_baru}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Nama PJ Pengganti : </label>
                        <div class="col-sm-9 col-form-label">
                        {{$id_adobe_pj->getuserpjbaru->name}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">No HP : </label>
                        <div class="col-sm-9 col-form-label">
                            {{$id_adobe_pj->nohp}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Alasan : </label>
                        <div class="col-sm-9 col-form-label">
                            {{$id_adobe_pj->alasan}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Status : </label>
                        <div class="col-sm-9 col-form-label">
                            @if($id_adobe_pj->status=='diproses')
                            <span class='badge bg-outline-warning'>Diproses</span>
                            @elseif($id_adobe_pj->status=='disetujui')
                            <span class='badge bg-outline-primary'>Disetujui</span>
                            @elseif($id_adobe_pj->status=='ditolak')
                            <span class='badge bg-outline-danger'>Ditolak</span>
                            @endif
                           
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Petugas : </label>
                        <div class="col-sm-9 col-form-label">
                            @if(!is_null($id_adobe_pj->getuserpetugas))
                                {{$id_adobe_pj->getuserpetugas->name}}
                            @else
                               <p class="fst-italic"> Belum diproses oleh petugas </p>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-3 col-form-label font-weight-bold">Diupdate Terakhir : </label>
                        <div class="col-sm-9 col-form-label">
                            {{$id_adobe_pj->updated_at}}
                        </div>
                    </div>
                </section>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Ok</button> -->
            </div>
        </div>
    </div>
</div>

 

                     