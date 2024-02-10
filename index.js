function RemoveForms(){
    document.getElementById('registerForm').classList.remove('active');
     document.getElementById('loginForm').classList.remove('active');
}
function showLoginForm() {
  document.getElementById('loginForm').classList.add('active');
  document.getElementById('registerForm').classList.remove('active');
}

function showRegisterForm() {
  document.getElementById('registerForm').classList.add('active');
  document.getElementById('loginForm').classList.remove('active');
}