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
                                            Apakah selama bulan {{$bulan->namabulan}} memanfaatkan lisensi Adobe CC pengadaan tahun 2024 ?
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="memakaiadobe" id="show" 
                                                value="1" checked="" >
                                                <label class="form-check-label" for="gridRadios1">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="memakaiadobe" id="hide" value="2">
                                                <label class="form-check-label" for="gridRadios2">Tidak</label>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="nextquestion">
                                        <div class="row mb-12">
                                            <label for="colFormLabel" class="fw-bold col-sm-3 col-form-label">
                                                Aplikasi apa saja yang digunakan selama bulan {{$bulan->namabulan}} ?
                                            </label>
                                            <div class="row" id="checkboxeskuesioner">
                                                <div class="col-sm-4">
                                                    <div class="form-check"> 
                                                        <input class="form-check-input" type="checkbox" name="acrobat" id="acrobat" value="1"  >
                                                        <label class="form-check-label" for="acrobat">Acrobat</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="aero" id="aero" value="1">
                                                        <label class="form-check-label" for="aero">Aero</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="aftereffect" id="aftereffect" value="1">
                                                        <label class="form-check-label" for="aftereffect">After Effect</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="animate" id="animate" value="1">
                                                        <label class="form-check-label" for="animate">Animate</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="audition" id="audition" value="1">
                                                        <label class="form-check-label" for="audition">Audition</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="behance" id="behance" value="1">
                                                        <label class="form-check-label" for="behance">Behance</label>
                                                    </div>  
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="dimension" id="dimension" value="1">
                                                        <label class="form-check-label" for="dimension">Dimension</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="dreamweaver" id="dreamweaver" value="1">
                                                        <label class="form-check-label" for="dreamweaver">Dreamweaver</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="express" id="express" value="1">
                                                        <label class="form-check-label" for="express">Express</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="fresco" id="fresco" value="1">
                                                        <label class="form-check-label" for="fresco">Fresco</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="illustrator" id="illustrator" value="1">
                                                        <label class="form-check-label" for="illustrator">Illustrator</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="incopy" id="incopy" value="1">
                                                        <label class="form-check-label" for="incopy">InCopy</label>
                                                    </div>  
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="indesign" id="indesign" value="1">
                                                        <label class="form-check-label" for="indesign">InDesign</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="lightroom" id="lightroom" value="1">
                                                        <label class="form-check-label" for="lightroom">Lightroom</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="photoshop" id="photoshop" value="1">
                                                        <label class="form-check-label" for="photoshop">Photoshop</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="prmierepro" id="prmierepro" value="1">
                                                        <label class="form-check-label" for="prmierepro">Premiere Pro</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="premiererush" id="premiererush" value="1">
                                                        <label class="form-check-label" for="premiererush">Premiere Rush</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="xd" id="xd" value="1">
                                                        <label class="form-check-label" for="xd">XD</label>
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
                                            <div class="row mb-3" id="inputskuesioner">
                                                <div class="col-sm-6">
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Publikasi : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="publikasi" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">BRS : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="brs" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Infografis : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="infografis" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Flyer/VB : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="flyer_vb" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Spanduk : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="spanduk" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Surat/Dokumen : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="surat" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Website : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="website" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Dashboard : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dashboard" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Video : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="video" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Lainnya: </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="lainnya" class="form-control" id="colFormLabel" placeholder="">
                                                        </div>
                                                        <label for="colFormLabel" class="col-sm-3 col-form-label">Sejumlah : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="jumlah_lain" class="form-control" id="colFormLabel" placeholder="0">
                                                        </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 

$(document).ready(function(){
  $("#hide").click(function(){
    $(".nextquestion").hide(500);
    $('#checkboxeskuesioner input:checkbox').prop('checked', false);
    $('input[name="publikasi"]').val("");
    $('input[name="brs"]').val("");
    $('input[name="infografis"]').val("");
    $('input[name="flyer_vb"]').val("");
    $('input[name="spanduk"]').val("");
    $('input[name="surat"]').val("");
    $('input[name="website"]').val("");
    $('input[name="dashboard"]').val("");
    $('input[name="video"]').val("");
    $('input[name="lainnya"]').val("");
    $('input[name="jumlah_lain"]').val(""); 
  });
  $("#show").click(function(){
    $(".nextquestion").show(500);
  });
});
<!-- Add Edit Modal End -->
</script>