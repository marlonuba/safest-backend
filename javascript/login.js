function mostrar() {
    var passwordInput = document.getElementById("pwd");
    var showPasswordIcon = document.getElementById("mostrarSenha");
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      showPasswordIcon.classList.remove("bx-show");
      showPasswordIcon.classList.add("bx-hide");
    } else {
      passwordInput.type = "password";
      showPasswordIcon.classList.remove("bx-hide");
      showPasswordIcon.classList.add("bx-show");
    }
  }