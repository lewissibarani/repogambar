  
 <!-- Add Edit Modal Start --> 
 <div class="modal fade" id="putModalAlbum" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div class="modal-body" style="padding:0px;"> 
                
                <div class="col-12 col-md-6 col-xl-12">
                    <div class="">
                        <div class="sh-50 row g-0 h-100">
                            <div class=" col-4 border-right">
                            <img class="card-img sh-50 scale " style="  border-top-left-radius: 15px;
                                    border-bottom-left-radius: 15px;"  
                            src="{{$Data->thumbnail_path}}" 
                            alt="card image" />
                            </div>
                            <div class="col-8">
                                <div class="card-body m-5">
                                    <h1 class="">Daftar Koleksiku:</h1>
                                    <div class=""> 
                                        <form action="{{route('dashboard.puttoalbum')}}" method="POST" novalidate>
                                            @csrf   
                                            <div class="mb-3">  
                                                <div class="row mb-3">
                                                    <input type="hidden" value="{{$Data->id}}" class="form-control" id="judulalbum" name="gambar_id" /> 
                                                   
                                                    <div class="col-sm-10">
                                                        <select id="select2Multiple" class="form-select" name="album_id" >
                                                            <option selected> <i>Pilih Koleksimu...</i></option>
                                                            @foreach ($Album as $koleksi)
                                                                <option value="{{$koleksi->id}}">{{ $koleksi->judulalbum }}</option> 
                                                            @endforeach
                                                        </select>  
                                                    </div>
                                                </div> 
                                                <div class="" style="position:realtive;">
                                                <div  style="position: absolute; bottom: 20px; ">
                                                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                                                    <button id="submit" type="submit" class="btn btn-primary" >Simpan</button>
                                                </div>
                                                
                                                </div>
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