<!-- Add Edit Modal Start -->
<div class="modal large fade" id="addDokumenPenting" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="modalTitle">Form Unggah Dokumen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="createGambarForm" action="{{route('adobebps.uploaddokumenstore')}}" 
                                enctype="multipart/form-data"
                                method="POST" novalidate>
                                @csrf  
                                <section class="scroll-section" id="labelSize"> 
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="namadokumen" name="namadokumen"/> 
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputState" class="col-sm-3 col-form-label">File PDF</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" 
                                            name="filedokumen"
                                            id="filedokumen"/>
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