window.togglePasswordFn = function(passwordInput) {
    var passwordInput = document.getElementById(passwordInput);
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
}