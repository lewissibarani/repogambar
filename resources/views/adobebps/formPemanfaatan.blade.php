<!-- Add Edit Modal Start -->
<div class="modal large fade" id="kuesioner{{$bulan->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="modalTitle">Kuesioner Pemanfaatan Adobe {{$bulan->namabulan}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="createGambarForm" action="{{ route('adobebps.storelaporan') }}" method="POST" novalidate>
                                @csrf  
                                <section class="scroll-section" id="labelSize"> 
                                <input class="form-check-input" type="hidden" 
                                                name="idbulan" id="gridRadios1" value="{{$bulan->id}}" > 
                                    <div class="row mb-12">
                                        <label for="colFormLabel" class="fw-bold col-sm-3 col-form-label">
                                            Apakah selama bulan {{$bulan->namabulan}} memanfaatkan linsensi Adobe CC pengadaan tahun 2024 ?
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pertanyaan1" id="gridRadios1" 
                                                value="1" checked="" >
                                                <label class="form-check-label" for="gridRadios1">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pertanyaan1" id="gridRadios2" value="2">
                                                <label class="form-check-label" for="gridRadios2">Tidak</label>
                                            </div> 
                                        </div>
                                    </div>   
                                    <div class="row mb-12">
                                        <label for="colFormLabel" class="fw-bold col-sm-3 col-form-label">
                                            Aplikasi apa saja yang digunakan selama bulan {{$bulan->namabulan}} ?
                                        </label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Acrobat</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Aero</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">After Effect</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Animate</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Audition</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Behance</label>
                                                </div>  
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Dimension</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Dreamweaver</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Express</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Fresco</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Illustrator</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">InCopy</label>
                                                </div>  
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">InDesign</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Lightroom</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Photoshop</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Premiere Pro</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">Premiere Rush</label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">XD</label>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>   
                                    <div class="row mb-12">
                                        <label for="colFormLabel" class="fw-bold col-sm-3 col-form-label">
                                            Produk BPS apa saja yang dihasilkan menggunakan Adobe CC 2024 selama bulan {{$bulan->namabulan}} ?
                                            <br/> 
                                            Sebutkan jumlah produk yang dihasilkan !
                                        </label>  
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <div class="row mb-3">
                                                    <label for="colFormLabel" class="col-sm-5 col-form-label">Publikasi sejumlah: </label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="colFormLabel" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="colFormLabel" class="col-sm-5 col-form-label">BRS sejumlah: </label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="colFormLabel" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="colFormLabel" class="col-sm-5 col-form-label">Infografis sejumlah: </label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="colFormLabel" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="colFormLabel" class="col-sm-5 col-form-label">Surat/Dokumen sejumlah: </label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="colFormLabel" placeholder="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                               
                                                <div class="row mb-3">
                                                    <label for="colFormLabel" class="col-sm-5 col-form-label">Website sejumlah: </label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="colFormLabel" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="colFormLabel" class="col-sm-5 col-form-label">Dashboard sejumlah: </label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="colFormLabel" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="colFormLabel" class="col-sm-5 col-form-label">Video sejumlah: </label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="colFormLabel" placeholder="">
                                                    </div>
                                                </div>
                                                 

                                            </div>
                                        </div>
                                    </div>   
                                </section> 
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