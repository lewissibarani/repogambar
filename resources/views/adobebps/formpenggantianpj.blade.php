<!-- Add Edit Modal Start -->
<div class="modal large fade" id="formpenggantianpj" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="modalTitle">Form Pengajuan Ganti PJ Adobe</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="createGambarForm" class="needs-validation" action="{{route('adobebps.ajukanpengganti')}}" method="POST" 
                                enctype="multipart/form-data"
                                novalidate>
                                @csrf   
                                            <div class="row mb-3"> 
                                                <label for="colFormLabel" class="col-sm-3 col-form-label">Akun Yang Akan Diganti : </label>
                                                <div class="col-sm-9"> 
                                                    <select id="select2Basic" class="form-select" name="pjsaatini" required>
                                                        <option selected></option>
                                                        @foreach ($adobepj as $adobebpjlisensi)
                                                            <option value="{{$adobebpjlisensi->id}}">{{ $adobebpjlisensi->email }}</option> 
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Silahkan isi.</div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputState" class="col-sm-3 col-form-label">Akun Pengganti : </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="emailpengganti" class="form-control" id="colFormLabel" required> 
                                                    <div id="passwordHelpBlock" class="form-text">
                                                        1. Gunakan e-mail domain bps!
                                                    </div>
                                                    <div id="passwordHelpBlock" class="form-text">
                                                        2. Tuliskan email yang sama dengan yang diatas, jika hanya ingin mengupdate nama dan  no. hp penanggung jawab.
                                                    </div>
                                                    <div class="invalid-feedback">Silahkan isi.</div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputState" class="col-sm-3 col-form-label">Nama Penanggung Jawab Pengganti : </label>
                                                <div class="col-sm-9">
                                                    <select id="selectTemplating" class="form-select" name="pjpengganti" required>
                                                        <option selected></option>
                                                        @foreach ($UserPJSatker as $useradobebpjlisensi)
                                                            <option value="{{ $useradobebpjlisensi->id }}">{{ $useradobebpjlisensi->name }}</option> 
                                                        @endforeach
                                                    </select>
                                                    <div id="passwordHelpBlock" class="form-text">
                                                        Pastikan pegawai pengganti sudah pernah login kedalam pikart sebelumnya.
                                                    </div>
                                                    <div class="invalid-feedback">Silahkan isi.</div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputState" class="col-sm-3 col-form-label">No HP Penanggung Jawab Pengganti : </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nohppengganti" class="form-control" id="colFormLabel" required> 
                                                    <div class="invalid-feedback">Silahkan isi.</div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="colFormLabel" class="col-sm-3 col-form-label">Alasan : </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="alasan" name="alasan" rows="4" cols="50" required></textarea>
                                                    <div class="invalid-feedback">Silahkan isi.</div>
                                                </div> 
                                            </div>  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" >Kirim</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
<!-- Add Edit Modal End -->