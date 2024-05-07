const passError = document.getElementById("passError");
const form = document.querySelector("form");
const pass = document.getElementById("pass");

form.addEventListener("submit",function(e){

    if (pass.value.length<8 || !/[\W+]/.test(pass.value)) {
        passError.textContent = "La password deve contenere almeno 8 caratteri tra cui un simbolo";
        e.preventDefault();
    }
});