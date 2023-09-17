  
 <!-- Add Edit Modal Start --> 
 <div class="modal fade" id="putModalAlbum" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div class="modal-body" style="padding:0px;"> 
                
                <div class="col-12 col-md-6 col-xl-12">
                    <div class="">
                        <div class="row g-0 h-100">
                            <div class=" col-4"  
                                    style="  
                                    background-image: url('{{Storage::temporaryUrl($Data->thumbnail_path,now()->addMinutes(30))}}');
                                    background-repeat: no-repeat ;
                                    background-size: contain;
                                    border-top-left-radius: 15px;
                                    border-bottom-left-radius: 15px;
                                    min-height: 300px;
                                    ">
                            </div>
                            <div class="col-8">
                                <div class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                    <div class="d-flex flex-column"> 
                                        <form action="{{route('dashboard.puttoalbum')}}" method="POST" novalidate>
                                            @csrf   
                                            <div class="mb-3">  
                                                <div class="row mb-3">
                                                    <input type="hidden" value="{{$Data->id}}" class="form-control" id="judulalbum" name="gambar_id" /> 
                                                    <label class="font-weight-bold col-sm-2 col-form-label">Daftar Koleksiku:</label>
                                                    <div class="col-sm-10">
                                                        <select id="select2Multiple" class="form-select" name="album_id" >
                                                            <option selected> <i>Pilih Koleksimu...</i></option>
                                                            @foreach ($Album as $koleksi)
                                                                <option value="{{$koleksi->id}}">{{ $koleksi->judulalbum }}</option> 
                                                            @endforeach
                                                        </select>  
                                                    </div>
                                                </div> 
                                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                                                <button id="submit" type="submit" class="btn btn-primary" >Simpan</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</div>
<!-- Add Edit Modal End -->