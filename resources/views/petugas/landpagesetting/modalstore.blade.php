 <!-- Add Edit Modal Start -->
                
 <div class="modal large fade" id="storeModalLandpage" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modalTitle">Form Penambahan Koleksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('landpagesetting.store')}}" method="POST" novalidate>
                @csrf
                @error('namakoleksi')
                <div class="mb-3 text-danger">
                    {{$message}}
                </div>
                @enderror
                @error('tagname')
                <div class="mb-3 text-danger">
                    {{$message}}
                </div>
                @enderror 

                <section class="scroll-section" id="labelSize">
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Nama Koleksi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="colFormLabel" name="namakoleksi" /> 
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label  for="colFormLabel" class="col-sm-3 col-form-label">Tags</label>
                        <div class="col-sm-9">
                            <input 
                                    id="tagsBasic"
                                    name="tagname" 
                            />
                            <small class="form-text text-muted">Isian ini berfungsi agar semua yang memiliki tag serupa masuk ke dalam koleksi ini.</small>
                            <!-- <input class="form-control" type="text" data-role="tagsinput" name="tags"> -->
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