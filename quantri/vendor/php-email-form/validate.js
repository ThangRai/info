document
  .querySelectorAll('.php-email-form')
  .forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const action = form.getAttribute('action');
      const formData = new FormData(form);

      form.querySelector('.loading').style.display = 'block';
      form.querySelector('.error-message').style.display = 'none';
      form.querySelector('.sent-message').style.display = 'none';

      fetch(action, {
        method: 'POST',
        body: formData
      })
        .then((response) => response.json())
        .then((data) => {
          form.querySelector('.loading').style.display = 'none';

          if (data.status === 'success') {
            form.querySelector('.sent-message').style.display = 'block';
            form.reset();
          } else {
            form.querySelector('.error-message').innerHTML = data.message;
            form.querySelector('.error-message').style.display = 'block';
          }
        })
        .catch((error) => {
          form.querySelector('.loading').style.display = 'none';
          form.querySelector('.error-message').innerHTML = 'Gửi thất bại. Hãy thử lại.';
          form.querySelector('.error-message').style.display = 'block';
        });
    });
  });
