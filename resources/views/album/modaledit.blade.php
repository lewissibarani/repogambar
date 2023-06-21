  
 <!-- Add Edit Modal Start -->
 
 <div class="modal large fade" id="editModalAlbum" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modalTitle">Edit Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{route('album.update',['albumid'=>$id])}}" method="POST" novalidate> --}}
                <form id="formEditModalAlbum"> 

                <section class="scroll-section" id="labelSize">
                    <input type="hidden" id="albumid" name="albumid" value="">
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Judul Album</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editjudulalbum" name="editjudulalbum" value=""> 
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" rows="5" id="editdeskripsi" name="editdeskripsi" value=""> 
                            </textarea> 
                        </div>
                    </div> 
                    {{-- <div class="row mb-3">
                        <label  for="colFormLabel" class="col-sm-3 col-form-label">Tags</label>
                        <div class="col-sm-9">
                            <input
                                    id="tagsBasic"
                                    class="editmodalalbumtags"
                                    name="edittags"  
                            />
                            <small class="form-text text-muted">Isian ini berfungsi agar semua yang memiliki tag serupa masuk ke dalam album ini.</small>
                            <!-- <input class="form-control" type="text" data-role="tagsinput" name="tags"> -->
                        </div>
                    </div>    --}}
                </section> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                <button id="submit" type="submit" class="btn btn-primary" >Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Edit Modal End -->