/**
 *
 * AuthRegister
 *
 * Petugas.Authentication.Petugas page content scripts. Initialized from scripts.js file.
 *
 *
 */

 class AuthPetugas {
    constructor() {
      // Initialization of the page plugins
      this._initForm();
    }
  
    // Form validation
    _initForm() {
      const form = document.getElementById('petugasModalForm');
      if (!form) {
        return;
      }
      const validateOptions = {
        rules: {
          gambar: {
            required: true,
          },
          source_id: {
            required: true,
          },
          tags: {
            required: true,
          },
        },
        messages: {
          gambar: {
            required: 'Field ini wajid diisi',
          },
          source_id: {
            required: 'Field ini wajid diisi',
          },
          tags: {
            required: 'Field ini wajid diisi',
          },
        },
      };
      jQuery(form).validate(validateOptions);
  
    //   form.addEventListener('submit', (event) => {
    //     event.preventDefault();
    //     event.stopPropagation();
    //     if (jQuery(form).valid()) {
    //       const formValues = {
    //         gambar: form.querySelector('[name="registerEmail"]').value,
    //         tags: form.querySelector('[name="registerPassword"]').value,
    //         source_id: form.querySelector('[name="registerName"]').value,
    //         };
    //         form.ajax({
    //             url: "/Petugas/Store",
    //             type:"POST",
    //             data:{
    //               "_token": "{{ csrf_token() }}",
    //               gambar:email,
    //               tags:tags,
    //               source_id:source_id,
    //             },
    //             success:function(response){
    //               $('#successMsg').show();
    //               console.log(response);
    //             },
    //             error: function(response) {
    //             },
    //             });
    //       console.log(formValues);
    //       return;
    //     }
    //   });
    }
  }
  