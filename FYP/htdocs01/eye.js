document.addEventListener('DOMContentLoaded', function () {
  const loginPasswordInput = document.getElementById('loginPassword');
  const toggleLoginPasswordButton = document.getElementById('toggleLoginPassword');

  toggleLoginPasswordButton.addEventListener('click', function () {
    if (loginPasswordInput.type === 'password') {
      loginPasswordInput.type = 'text';
      toggleLoginPasswordButton.textContent = 'Hide Password';
    } else {
      loginPasswordInput.type = 'password';
      toggleLoginPasswordButton.textContent = 'Show Password';
    }
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const registerPasswordInput = document.getElementById('registerPassword');
  const toggleRegisterPasswordButton = document.getElementById('toggleRegisterPassword');

  toggleRegisterPasswordButton.addEventListener('click', function () {
    if (registerPasswordInput.type === 'password') {
      registerPasswordInput.type = 'text';
      toggleRegisterPasswordButton.textContent = 'Hide Password';
    } else {
      registerPasswordInput.type = 'password';
      toggleRegisterPasswordButton.textContent = 'Show Password';
    }
  });
});

