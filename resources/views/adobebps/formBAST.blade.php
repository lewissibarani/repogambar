<!-- Add Edit Modal Start -->
<div class="modal large fade" id="tambahlaporanadobe" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="modalTitle">Form Unggah BAST Tahun {{$value_selectedPeriode}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="createGambarForm" action="{{route('adobebps.storeBAST')}}" method="POST" 
                                enctype="multipart/form-data"
                                novalidate>
                                @csrf  
                                <section class="scroll-section" id="labelSize"> 
                                    <div class="row mb-3">
                                        <label for="inputState" class="col-sm-3 col-form-label">File PDF</label>
                                        <div class="col-sm-9">
                                        <section class="scroll-section" id="default">
                                            <input type="text" class="form-control" 
                                            name="periode_bast" value="{{$selectedPeriode}}" required hidden> 

                                            <input type="file" class="form-control" 
                                            name="bast_input"
                                            id="bast_input"  />
                                            <div id="passwordHelpBlock" class="form-text">
                                               Link download : <a href="https://bucket.bps.go.id/0320-dds-pikart/storage/file/2024_04_29_02_01_11BERITA%20ACARA%20INSTALASI%20DAN%20AKTIVASI%202024.docx" class="text-bold">Templat BAST Adobe</a>
                                            </div>
                                        </section>
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