<!-- Add Edit Modal Start -->
<div class="modal large fade" id="kuesioneredit{{$bulan->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="modalTitle">Edit Kuesioner Tahun Pegadaan {{$value_selectedPeriode}} bulan {{$bulan->namabulan}}  </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="createGambarForm" action="{{route('adobebps.storeeditlaporan')}}" method="POST" novalidate>
                                @csrf  
                                <section class="scroll-section" id="labelSize"> 
                                <input class="form-check-input" type="hidden" 
                                                name="idbulan" id="gridRadios1" value="{{$bulan->id}}" >  
                                <input class="form-check-input" type="hidden" 
                                                name="idkuesioner" id="gridRadios1" value="{{$dataslaporan->id}}" > 
                                    <div class="row mb-12">
                                        <label for="colFormLabel" class="fw-bold col-sm-3 col-form-label">
                                            Apakah selama bulan {{$bulan->namabulan}} memanfaatkan lisensi Adobe CC pengadaan tahun 2024 ?
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="memakaiadobe" id="showedit" 
                                                value="1" <?php echo ($dataslaporan->memakaiadobe=='1')?'checked':'' ?>>
                                                <label class="form-check-label" for="gridRadios1">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="memakaiadobe" 
                                                id="hideedit" value="2" <?php echo ($dataslaporan->memakaiadobe=='2')?'checked':'' ?>>
                                                <label class="form-check-label" for="gridRadios2">Tidak</label>
                                            </div> 
                                        </div>
                                    </div> 
                                     
                                    <div class="nextquestionedit">
                                        <div class="row mb-12">
                                            <label for="colFormLabel" class="fw-bold col-sm-3 col-form-label">
                                                Aplikasi apa saja yang digunakan selama bulan {{$bulan->namabulan}} ?
                                            </label>
                                            <div class="row" id="checkboxeskuesioneredit">
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->acrobat==1)? "checked" : "" }}
                                                        name="acrobat" id="acrobat" value="1">
                                                        <label class="form-check-label" for="acrobat">Acrobat</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                        {{ ($dataslaporan->aero==1)? "checked" : "" }}
                                                        name="aero" id="aero" value="1">
                                                        <label class="form-check-label" for="aero">Aero</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->aftereffect==1)? "checked" : "" }} 
                                                        name="aftereffect" id="aftereffect" value="1">
                                                        <label class="form-check-label" for="aftereffect">After Effect</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->animate==1)? "checked" : "" }}  
                                                        name="animate" id="animate" value="1">
                                                        <label class="form-check-label" for="animate">Animate</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->audition==1)? "checked" : "" }}   
                                                        name="audition" id="audition" value="1">
                                                        <label class="form-check-label" for="audition">Audition</label>
                                                    </div>   
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->dimension==1)? "checked" : "" }} 
                                                        name="dimension" id="dimension" value="1">
                                                        <label class="form-check-label" for="dimension">Dimension</label>
                                                    </div> 
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->dreamweaver==1)? "checked" : "" }}
                                                        name="dreamweaver" id="dreamweaver" value="1">
                                                        <label class="form-check-label" for="dreamweaver">Dreamweaver</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->express==1)? "checked" : "" }} 
                                                        name="express" id="express" value="1">
                                                        <label class="form-check-label" for="express">Express</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->fresco==1)? "checked" : "" }}  
                                                        name="fresco" id="fresco" value="1">
                                                        <label class="form-check-label" for="fresco">Fresco</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->illustrator==1)? "checked" : "" }}   
                                                        name="illustrator" id="illustrator" value="1">
                                                        <label class="form-check-label" for="illustrator">Illustrator</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->incopy==1)? "checked" : "" }}
                                                        name="incopy" id="incopy" value="1">
                                                        <label class="form-check-label" for="incopy">InCopy</label>
                                                    </div>  
                                                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->indesign==1)? "checked" : "" }}
                                                        name="indesign" id="indesign" value="1">
                                                        <label class="form-check-label" for="indesign">InDesign</label>
                                                    </div> 
                                                </div>
                                                <div class="col-sm-4"> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->lightroom==1)? "checked" : "" }} 
                                                        name="lightroom" id="lightroom" value="1">
                                                        <label class="form-check-label" for="lightroom">Lightroom</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->photoshop==1)? "checked" : "" }}
                                                        name="photoshop" id="photoshop" value="1">
                                                        <label class="form-check-label" for="photoshop">Photoshop</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->premierepro==1)? "checked" : "" }}
                                                        name="premierepro" id="premierepro" value="1">
                                                        <label class="form-check-label" for="premierepro">Premiere Pro</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->premiererush==1)? "checked" : "" }}
                                                        name="premiererush" id="premiererush" value="1">
                                                        <label class="form-check-label" for="premiererush">Premiere Rush</label>
                                                    </div> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" 
                                                        {{ ($dataslaporan->xd==1)? "checked" : "" }}
                                                        name="xd" id="xd" value="1">
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
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Publikasi : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="publikasi" class="form-control" 
                                                            value="{{$dataslaporan->publikasi}}"
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">BRS : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="brs" class="form-control" 
                                                            value="{{$dataslaporan->brs}}"
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Infografis : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="infografis" class="form-control" 
                                                            value="{{$dataslaporan->infografis}}" 
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Flyer/VB : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="flyer_vb" class="form-control" 
                                                            value="{{$dataslaporan->flyer_vb}}"  
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Spanduk : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="spanduk" class="form-control" 
                                                            value="{{$dataslaporan->spanduk}}"   
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Surat/Dokumen : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="suratdokumen" class="form-control" 
                                                            value="{{$dataslaporan->suratdokumen}}"    
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Website : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="website" class="form-control" 
                                                            value="{{$dataslaporan->website}}"   
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Dashboard : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dashboard" class="form-control" 
                                                            value="{{$dataslaporan->dashboard}}"    
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-5 col-form-label">Video : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="video" class="form-control" 
                                                            value="{{$dataslaporan->video}}"    
                                                            id="colFormLabel" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Lainnya: </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="lainnya" class="form-control" 
                                                            value="{{$dataslaporan->lainnya}}"
                                                            id="colFormLabel" placeholder="">
                                                        </div>
                                                        <label for="colFormLabel" class="col-sm-3 col-form-label">Sejumlah : </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="jumlah_lain" class="form-control" 
                                                            value="{{$dataslaporan->jumlah_lain}}"
                                                            id="colFormLabel" placeholder="0">
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
<!-- Add Edit Modal End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 

$(document).ready(function(){
  $("#hideedit").click(function(){
    $(".nextquestionedit").hide(500);
    $('#checkboxeskuesioneredit input:checkbox').prop('checked', false);
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
  $("#showedit").click(function(){
    $(".nextquestionedit").show(500);
  });
});
<!-- Add Edit Modal End -->
</script>