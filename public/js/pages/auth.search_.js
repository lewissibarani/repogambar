/**
 *
 * AuthRegister
 *
 * Pages.Authentication.Register page content scripts. Initialized from scripts.js file.
 *
 *
 */

 class SearchDashboard_ {
    constructor() {
      // Initialization of the page plugins
      this._initForm();
    }
  
    // Form validation
    _initForm() {
      const form = document.getElementById('searchGambarForm_');
      if (!form) {
        return;
      }
      const validateOptions = {
        errorPlacement: function($error, $element) {
          $error.appendTo($element.closest("form"));
        },
        rules: {
            katakunci: {
                required: true,
          },
        },
        messages: {
            katakunci: {
                required: 'Field ini harus diisi',
          },
        },
      };
      jQuery(form).validate(validateOptions);
  
      // form.addEventListener('submit', (event) => {
      //   event.preventDefault();
      //   event.stopPropagation();
      //   if (jQuery(form).valid()) {
      //     const formValues = {
      //       email: form.querySelector('[name="registerEmail"]').value,
      //       password: form.querySelector('[name="registerPassword"]').value,
      //       name: form.querySelector('[name="registerName"]').value,
      //     };
      //     console.log(formValues);
      //     return;
      //   }
      // });
    }
  }
  