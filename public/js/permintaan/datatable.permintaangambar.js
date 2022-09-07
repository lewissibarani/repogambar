/**
 *
 * RowsAjax
 *
 * Interface.Plugins.Datatables.RowsAjax page content scripts. Initialized from scripts.js file.
 *
 *
 */

 class PermintaanGambar {
  constructor() {
    if (!jQuery().DataTable) {
      console.log('DataTable is null!');
      return;
    }

    // Selected single row which will be edited
    this._rowToEdit;

    // Datatable instance
    this._datatable;

    // Edit or add state of the modal
    this._currentState;

    // Controls and select helper
    this._datatableExtend;

    // Add or edit modal
    this._addEditModal;
    

    // Datatable single item height
    this._staticHeight = 62;

    this._createInstance();
    this._addListeners();
    // this._extend();
    this._initBootstrapModal();
    this._initForm();
  }

  // Creating datatable instance. Table data is provided by json/products.json file and loaded via ajax
  _createInstance() {
    const _this = this;
    this._datatable = jQuery('#datatablePermintaanGambar').DataTable({
      scrollX: true,
      buttons: ['copy', 'excel', 'csv', 'print'],
      info: false,
      ajax: '/KelolaGambar/DaftarPermintaan',
      order: [], // Clearing default order
      sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>', // Hiding all other dom elements except table and pagination
      pageLength: 10,
      columns: [{data: function ( row, type, val, meta ) {
          val = '#'+ row.id_permintaan ;
          return val;
          }
        }, {data: 'judulPermintaan'},{data: 'kegunaan.kegunaan'}, {data: 'linkPermintaan'}, {data: 'created_at'}, {data: 'Status'}
      ],
      language: {
        paginate: {
          previous: '<i class="cs-chevron-left"></i>',
          next: '<i class="cs-chevron-right"></i>',
        },
      },
      initComplete: function (settings, json) {
        _this._setInlineHeight();
      },
      drawCallback: function (settings) {
        _this._setInlineHeight();
      },
      columnDefs: [
        // Adding Name content as an anchor with a target #
        { width: "10%",
          targets: 0,
          render: function (data, type, row, meta) {
            return '<a data-bs-toggle="modal" href="#previewModal" data-bs-toggle="modal" data-bs-target="#previewModal"> ' + data + '</a>';
          },
        },

        {
          targets: 1,
          render: function (data) {
            if (data.length > 30) {
              return data.substring(0, 30) + '...';
           } else {
              return data;
           }
            
          }

        },
        // Memotong Text agar tidak terlalu panjang
        {
          targets: 3,
          render: function (data) {
            if (data.length > 30) {
              return '<a class="" href="'+ data +' " target="_blank" rel="noopener noreferrer">' + data.substring(0, 30) + '...'+ '</a>';
           } else {
              return '<a class="" href="'+ data +' " target="_blank" rel="noopener noreferrer">' + data + '</a>';
           }
            
          }

        },
        {
          targets: 4,
          render: function (data) {

            function dateFormat(inputDate, format) {
              //parse the input date
              const date = new Date(inputDate);
          
              //extract the parts of the date
              const day = date.getDate();
              const month = date.getMonth() + 1;
              const year = date.getFullYear();    
          
              //replace the month
              
              format = format.replace("MM",date.toLocaleString('default', { month: 'long' }));        
          
              //replace the year
              if (format.indexOf("yyyy") > -1) {
                  format = format.replace("yyyy", year.toString());
              } else if (format.indexOf("yy") > -1) {
                  format = format.replace("yy", year.toString().substr(2,2));
              }
          
              //replace the day
              format = format.replace("dd", day.toString().padStart(2,"0"));
          
              return format;
            }
            
            return dateFormat(data, 'dd MM yyyy');
          }

        },

        // Adding Tag content as a span with a badge class
        {
          targets: 5,
          render: function (data, type, row, meta) {
            
            let downloadButton;
            switch (row.idStatus) {
              case 3:
                downloadButton =  '<div class="col-12 col-md-5 d-flex align-items-center justify-content-md-center">'+
                                      '<a download="'+ row.gambar.nama_gambar +'" class="btn btn-sm btn-icon btn-primary"'+
                                          'href="/'+ row.gambar.path +'">'+
                                        'Download'+
                                      '</a>'+
                                  '</div>';

                return downloadButton;
                break;
              default:
                return '<div class="col-12 col-md-5 d-flex align-items-center justify-content-md-center">'+ 
                // row.status.status +
                '</div>';
                break;
            }
            
          },
        },
      ],
    });
  }

  _addListeners() {
    
    document.querySelectorAll('.delete-datatable').forEach((el) => el.addEventListener('click', this._onDeleteClick.bind(this)));

    // Listener for edit button
    document.querySelectorAll('.edit-datatable').forEach((el) => el.addEventListener('click', this._onEditButtonClick.bind(this)));

    // Calling a function to update tags on click
    document.querySelectorAll('.tag-done').forEach((el) => el.addEventListener('click', () => this._updateTag('Done')));
    document.querySelectorAll('.tag-new').forEach((el) => el.addEventListener('click', () => this._updateTag('New')));
    document.querySelectorAll('.tag-sale').forEach((el) => el.addEventListener('click', () => this._updateTag('Sale')));

    // Calling clear form when modal is closed
    document.getElementById('addEditModal').addEventListener('hidden.bs.modal', this._clearModalForm);
  }

  // Extending with DatatableExtend to get search, select and export working
  _extend() {
    this._datatableExtend = new DatatableExtend({
      datatable: this._datatable,
      editRowCallback: this._onEditRowClick.bind(this),
      singleSelectCallback: this._onSingleSelect.bind(this),
      multipleSelectCallback: this._onMultipleSelect.bind(this),
      anySelectCallback: this._onAnySelect.bind(this),
      noneSelectCallback: this._onNoneSelect.bind(this),
    });
  }

  // Keeping a reference to add/edit modal
  _initBootstrapModal() {
    this._addEditModal = new bootstrap.Modal(document.getElementById('addEditModal'));
  }

  // Setting static height to datatable to prevent pagination movement when list is not full
  _setInlineHeight() {
    if (!this._datatable) {
      return;
    }
    const pageLength = this._datatable.page.len();
    document.querySelector('.dataTables_scrollBody').style.height = this._staticHeight * pageLength + 'px';
  }
  
  // Top side edit icon click
  _onEditButtonClick(event) {
    if (event.currentTarget.classList.contains('disabled')) {
      return;
    }
    const selected = this._datatableExtend.getSelectedRows();
    this._onEditRowClick(this._datatable.row(selected[0][0]));
  }

  // Direct click from row title
  _onEditRowClick(rowToEdit) {
    this._rowToEdit = rowToEdit; // Passed from DatatableExtend via callback from settings
    this._setForm();
  }

  // Delete icon click
  _onDeleteClick() {
    const selected = this._datatableExtend.getSelectedRows();
    selected.remove().draw();
    this._datatableExtend.controlCheckAll();
  }

  // Filling the modal form data
  _setForm() {
    const data = this._rowToEdit.data();

    function dateFormat(inputDate, format) {
      //parse the input date
      const date = new Date(inputDate);
  
      //extract the parts of the date
      const day = date.getDate();
      const month = date.getMonth() + 1;
      const year = date.getFullYear();    
  
      //replace the month
      
      format = format.replace("MM",date.toLocaleString('default', { month: 'long' }));        
  
      //replace the year
      if (format.indexOf("yyyy") > -1) {
          format = format.replace("yyyy", year.toString());
      } else if (format.indexOf("yy") > -1) {
          format = format.replace("yy", year.toString().substr(2,2));
      }
  
      //replace the day
      format = format.replace("dd", day.toString().padStart(2,"0"));
  
      return format;
    }
    
    document.querySelector('.idPermintaan').innerHTML = data.id_permintaan;
    document.querySelector('.previewLink').innerHTML = data.linkPermintaan;
    document.querySelector('.previewJudul').innerHTML = data.judulPermintaan;

    if (data.idKegunaan == 4) {
      document.querySelector('.previewKegunaan').innerHTML = data.kegunaan_lainnya;
    } else {
      document.querySelector('.previewKegunaan').innerHTML = data.kegunaan.kegunaan;
    }

    document.querySelector('.previewWaktu').innerHTML = dateFormat(data.created_at,'dd MM yyyy');
    document.querySelector('.previewStatus').innerHTML = data.status.status;

    //--Alasan Ditolak Start
    let alasanTolak;
      switch (data.idStatus) {
        case 2:
        alasanTolak =  
          '<div class="row mb-3">'+
              '<div class="font-weight-bold col-sm-3 col-form-label">'+
                  '<div class="d-flex flex-row-reverse text-info">Alasan Ditolak :</div>'+
              '</div>'+
              '<div class="col-sm-9">'+
                  '<div class="col-sm-12 col-form-label card no-shadow">'+
                    data.alasanDitolak +
                  '</div>'+
              '</div>'+
          '</div> '
          document.querySelector('.previewAlasanTolak').innerHTML = alasanTolak;

          break;
        default:
          alasanTolak = "";
          break;
      }

      
    let downloadButton;
      switch (data.idStatus) {
        case 3:
          downloadButton = 
          '<div class="row mb-3">'+
                    '<div class="font-weight-bold col-sm-3 col-form-label">'+
                        '<div class="d-flex flex-row-reverse text-info"> Link Gambar : </div>'+
                    '</div>'+
                    '<div class="col-sm-9">'+
                        '<a class="btn btn-outline-primary" href="/'+data.gambar.path +'" download="'+data.gambar.nama_gambar+'"><i data-acorn-icon="download" data-acorn-size="16"></i> Download Gambar</a>'+
                    '</div>'+
          '</div>'
          document.querySelector('.tombolDownload').innerHTML = downloadButton;
          break;
        default:
          downloadButton = "";
          break;
      }
  }

  // Clearing modal form
  _clearModalForm() {
    document.querySelector('#addEditModal form').reset();
  }

  // Update tag from top side dropdown
  _updateTag(tag) {
    const selected = this._datatableExtend.getSelectedRows();
    const _this = this;
    selected.every(function (rowIdx, tableLoop, rowLoop) {
      const data = this.data();
      data.Tag = tag;
      _this._datatable.row(this).data(data).draw();
    });
    this._datatableExtend.unCheckAllRows();
    this._datatableExtend.controlCheckAll();
  }

  // Single item select callback from DatatableExtend
  _onSingleSelect() {
    document.querySelectorAll('.edit-datatable').forEach((el) => el.classList.remove('disabled'));
  }

  // Multiple item select callback from DatatableExtend
  _onMultipleSelect() {
    document.querySelectorAll('.edit-datatable').forEach((el) => el.classList.add('disabled'));
  }

  // One or more item select callback from DatatableExtend
  _onAnySelect() {
    document.querySelectorAll('.delete-datatable').forEach((el) => el.classList.remove('disabled'));
    document.querySelectorAll('.tag-datatable').forEach((el) => el.classList.remove('disabled'));
  }

  // Deselect callback from DatatableExtend
  _onNoneSelect() {
    document.querySelectorAll('.delete-datatable').forEach((el) => el.classList.add('disabled'));
    document.querySelectorAll('.tag-datatable').forEach((el) => el.classList.add('disabled'));
  }

  _initForm() {
    const form = document.getElementById('createGambarForm');
    if (!form) {
      return;
    }
    const validateOptions = {
      rules: {
        judul: {
          required: true,
        },
        link: {
          required: true,
        },
        kegunaan: {
          required: true,
        },
      },
      messages: {
        judul: {
          required: 'Judul harus diisi',
        },
        link: {
          required: 'Link harus diisi',
        },
        kegunaan: {
          required: 'Harap pilih penggunaan',
        },
      },
    };
    jQuery(form).validate(validateOptions);
    
  }
}
