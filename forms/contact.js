.then(response => response.json())
.then(data => {
  if (data.status === 'success') {
    form.querySelector('.sent-message').classList.add('d-block');
    form.reset();
  } else {
    form.querySelector('.error-message').innerHTML = data.message;
    form.querySelector('.error-message').classList.add('d-block');
  }
})
