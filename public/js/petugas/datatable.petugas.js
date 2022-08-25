/**
 *
 * RowsAjax
 *
 * Interface.Plugins.Datatables.RowsAjax page content scripts. Initialized from scripts.js file.
 *
 *
 */

 class Petugas {
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
      this._petugasModal;
      
      
  
      // Datatable single item height
      this._staticHeight = 62;
  
      this._createInstance();
      // this._addListeners();
      // this._extend();
      this._initBootstrapModal();
    }
  
    // Creating datatable instance. Table data is provided by json/products.json file and loaded via ajax
    _createInstance() {
      const _this = this;
      this._datatable = jQuery('#datatablePetugas').DataTable({
        scrollX: true,
        buttons: ['copy', 'excel', 'csv', 'print'],
        info: false,
        ajax: '/Petugas/DaftarTugas',
        order: [], // Clearing default order
        sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>', // Hiding all other dom elements except table and pagination
        pageLength: 10,
        columns: [{data: function ( row, type, val, meta ) {
          val = '#'+row.permintaan.id_permintaan ;
          return val;
          }
        }, {data: 'permintaan.user.name'}, { data: 'permintaan.user.satker'},{ data: 'permintaan.linkPermintaan'},{data: 'Aksi'}],
        // {data: 'Check'}
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
            targets: 3,
            render: function (data, type, row, meta) {
              if (data.length > 5) {
                return '<a class="" href="'+ data +' " target="_blank" rel="noopener noreferrer">' + data.substring(0, 30) + '...'+ '</a>';
             } else {
                return '<a class="" href="'+ data +' " target="_blank" rel="noopener noreferrer">' + data + '</a>';
             }
            },
          },

          {
            targets: 4,
            render: function (data, type, row, meta) {
              if(row.permintaan.idStatus==1){
                return '<div class="col-12 col-md-5 d-flex align-items-center justify-content-md-center">'+
                '<a class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" target="_blank" rel="noopener noreferrer" href="transaksi/'+ row.permintaan.id +'/permintaan/'+ row.permintaan.user.kodesatker + row.permintaan.id +'">Layani</a>'+
                '</div>';
              }else{
                return '<div class="col-12 col-md-5 d-flex align-items-center justify-content-md-center">'+
                row.permintaan.status.status+
                '</div>';
              }
              
            },
          },
        ],
      });
    }
  
    _addListeners() {

    // Listener for confirm button on the edit/add modal
    document.getElementById('addEditConfirmButton').addEventListener('click', this._addEditFromModalClick.bind(this));

    // // Listener for add buttons
    // document.querySelectorAll('.add-datatable').forEach((el) => el.addEventListener('click', this._onAddRowClick.bind(this)));

    // // Listener for delete buttons
    // document.querySelectorAll('.delete-datatable').forEach((el) => el.addEventListener('click', this._onDeleteClick.bind(this)));

    // // Listener for edit button
    // document.querySelectorAll('.edit-datatable').forEach((el) => el.addEventListener('click', this._onEditButtonClick.bind(this)));

    // Calling a function to update tags on click
    // document.querySelectorAll('.tag-done').forEach((el) => el.addEventListener('click', () => this._updateTag('Done')));
    // document.querySelectorAll('.tag-new').forEach((el) => el.addEventListener('click', () => this._updateTag('New')));
    // document.querySelectorAll('.tag-sale').forEach((el) => el.addEventListener('click', () => this._updateTag('Sale')));

    // Calling clear form when modal is closed
    document.getElementById('petugasModal').addEventListener('hidden.bs.modal', this._clearModalForm);
    }
  
    // Extending with DatatableExtend to get search, select and export working
    _extend() {
      this._datatableExtend = new DatatableExtend({
        datatable: this._datatable,
        // editRowCallback: this._onEditRowClick.bind(this),
        singleSelectCallback: this._onSingleSelect.bind(this),
        multipleSelectCallback: this._onMultipleSelect.bind(this),
        anySelectCallback: this._onAnySelect.bind(this),
        noneSelectCallback: this._onNoneSelect.bind(this),
      });
    }
  
    // Keeping a reference to add/edit modal
    _initBootstrapModal() {
      // this._petugasModal = new bootstrap.Modal(document.getElementById('petugasModal'));
    }
  
    // Setting static height to datatable to prevent pagination movement when list is not full
    _setInlineHeight() {
      if (!this._datatable) {
        return;
      }
      const pageLength = this._datatable.page.len();
      document.querySelector('.dataTables_scrollBody').style.height = this._staticHeight * pageLength + 'px';
    }
  
    //Add or edit button inside the modal click
    _addEditFromModalClick(event) {
      if (this._currentState === 'add') {
        this._addNewRowFromModal();
      } else {
        this._editRowFromModal();
      }
      this._petugasModal.hide();
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

      // this._showModal('edit', 'Edit', 'Done');
      // this._setPreviewForm();
    }

    // Edit button inside th modal click
    _editRowFromModal() {
      const data = this._rowToEdit.data();
      const formData = Object.assign(data, this._getFormData());
      this._datatable.row(this._rowToEdit).data(formData).draw();
      this._datatableExtend.unCheckAllRows();
      this._datatableExtend.controlCheckAll();
    }
  
    // Add button inside th modal click
    _addNewRowFromModal() {
      const data = this._getFormData();
      this._datatable.row.add(data).draw();
      this._datatableExtend.unCheckAllRows();
      this._datatableExtend.controlCheckAll();
    }
  
    // Delete icon click
    _onDeleteClick() {
      const selected = this._datatableExtend.getSelectedRows();
      selected.remove().draw();
      this._datatableExtend.controlCheckAll();
    }
  
    // + Add New or just + button from top side click
    _onAddRowClick() {
      this._showModal('add', 'Formulir Permintaan Gambar', 'Kirim');
    }
  
    // Showing modal for an objective, add or edit
    _showModal(objective, title, button) {
      this._petugasModal.show();
      this._currentState = objective;
      // document.getElementById('modalTitle').innerHTML = title;
      // document.getElementById('addEditConfirmButton').innerHTML = button;
    }
  
    // Filling the modal form data
    // _setForm() {
    //   const data = this._rowToEdit.data();
    //   document.querySelector('#petugasModal input[name=Name]').value = data.Name;
    //   document.querySelector('#petugasModal input[name=Sales]').value = data.Sales;
    //   document.querySelector('#petugasModal input[name=Stock]').value = data.Stock;
    //   if (document.querySelector('#petugasModal ' + 'input[name=Category][value="' + data.Category + '"]')) {
    //     document.querySelector('#petugasModal ' + 'input[name=Category][value="' + data.Category + '"]').checked = true;
    //   }
    //   if (document.querySelector('#petugasModal ' + 'input[name=Tag][value="' + data.Tag + '"]')) {
    //     document.querySelector('#petugasModal ' + 'input[name=Tag][value="' + data.Tag + '"]').checked = true;
    //   }
    // }

    // Filling the modal form data
    _setPreviewForm() {
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

      //Merubah Format Id
      function Id(data) {
        data = '#'+data.permintaan.user.kodesatker + data.permintaan.id ;
        return data;
        }
      //--end of Merubah Format Id
      
      document.querySelector('.previewId').innerHTML = Id(data);

      
      document.querySelector('#petugasModal input[name=judul]').value=data.permintaan.judulPermintaan;
      document.querySelector('#petugasModal input[name=bagitugas_id]').value=data.id;

      document.querySelector('.previewLink').innerHTML = '<a href="'+ data.permintaan.linkPermintaan +' " target="_blank" rel="noopener noreferrer">' + data.permintaan.linkPermintaan + '</a>';
      document.querySelector('#petugasModal input[name=link]').value=data.permintaan.linkPermintaan;

      document.querySelector('.previewKegunaan').innerHTML = data.permintaan.kegunaan.kegunaan;
      document.querySelector('#petugasModal input[name=idKegunaan]').value=data.permintaan.kegunaan.id;

      document.querySelector('.previewWaktu').innerHTML = dateFormat(data.created_at,'dd MM yyyy');
      document.querySelector('.previewStatus').innerHTML = data.permintaan.status.status;
      //---Status Badge end

      //--Alasan Ditolak Start
      let alasanTolak;
        switch (data.permintaan.idStatus) {
          case 2:
            alasanTolak = "<span class='font-weight-bold'>Alasan Ditolak: </span>" + data.permintaan.alasanDitolak;
            break;
          default:
            alasanTolak = "";
            break;
        }
      document.querySelector('.previewAlasanTolak').innerHTML = alasanTolak;
      //--Alasan Ditolak end
      
    }
  
    // Getting form values from the fields to pass to datatable
    // _getFormData() {
    //   const data = {};
    //   data.Name = document.querySelector('#petugasModal input[name=Name]').value;
    //   data.Sales = document.querySelector('#petugasModal input[name=Sales]').value;
    //   data.Stock = document.querySelector('#petugasModal input[name=Stock]').value;
    //   data.Category = document.querySelector('#petugasModal input[name=Category]:checked')
    //     ? document.querySelector('#petugasModal input[name=Category]:checked').value || ''
    //     : '';
    //   data.Tag = document.querySelector('#petugasModal input[name=Tag]:checked')
    //     ? document.querySelector('#petugasModal input[name=Tag]:checked').value || ''
    //     : '';
    //   data.Check = '';
    //   return data;
    // }
  
    // Clearing modal form
    _clearModalForm() {
      // document.querySelector('#petugasModal form').reset();
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
  }
  