<!-- Add Edit Modal Start -->
<div class="modal large fade" id="kuesioner{{$bulan->namabulan}}" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
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
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">
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
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">
                                            Jika ya, jelaskan pemanfaatan software adobe yang satker anda sudah lakukan selama bulan {{$bulan->namabulan}} !
                                            <br/>
                                            Jika tidak, tuliskan secara singkat alasannya !
                                        </label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="pertanyaan2" rows="5"></textarea>
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