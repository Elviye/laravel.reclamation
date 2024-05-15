const modal = document.getElementById('myModal');
  const openModalButton = document.getElementById('openModalButton');
  const sendEmailButton = document.getElementById('sendEmailButton');
  const emailMessageInput = document.getElementById('emailMessage');

  openModalButton.addEventListener('click', function() {
    modal.style.display = 'block';
  });

  sendEmailButton.addEventListener('click', function() {
    const emailMessage = emailMessageInput.value;

    axios.post('/send-email', { message: emailMessage })
      .then(function(response) {
        console.log('Email sent successfully');
        modal.style.display = 'none';
        emailMessageInput.value = '';
      })
      .catch(function(error) {
        console.log('Email sending failed');
      });
  });

  const closeModalButtons = document.querySelectorAll('[data-bs-dismiss="modal"]');
  closeModalButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      modal.style.display = 'none';
    });
  });

  window.addEventListener('click', function(event) {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });