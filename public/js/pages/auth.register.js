/**
 *
 * AuthRegister
 *
 * Pages.Authentication.Register page content scripts. Initialized from scripts.js file.
 *
 *
 */

class AuthRegister {
  constructor() {
    // Initialization of the page plugins
    this._initForm();
  }

  // Form validation
  _initForm() {
    const form = document.getElementById('registerForm');
    if (!form) {
      return;
    }
    const validateOptions = {
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6,
          regex: /[a-z].*[0-9]|[0-9].*[a-z]/i,
        },
        name: {
          required: true,
        },
        kodesatker: {
          required: true,
        },
        satker: {
          required: true,
        },
        nohp:{
          required: true,
        }
      },
      messages: {
        email: {
          email: 'Your email address must be in correct format!',
        },
        password: {
          minlength: 'Password must be at least {0} characters!',
          regex: 'Password must contain a letter and a number!',
        },
        name: {
          required: 'Please enter your name!',
        },
        kodesatker: {
          required: 'Harap isi kode satkermu',
        },
        satker: {
          required: 'Harap isi nama satkermu',
        },
        nohp:{
          required: 'Field ini wajid diisi',
        }
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
