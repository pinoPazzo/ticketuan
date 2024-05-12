let allert = document.querySelector('#allert2');
let error = document.querySelector('#error')
allert.style.display = 'none';

const form = document.querySelector("form");

form.addEventListener("submit",function(e){
    let pass = form.elements["nuovaPass"].value;
    console.log(pass)
    if (/[A-Z]/.test(pass) && /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(pass) && /[a-z]/.test(pass) && pass.length > 7 && /[0-9]/.test(pass)) {

    }else{
        allert.style.display = "block";
        error.innerHTML = "Password troppo semplice. La password deve contenere: una lettera maiuscula, una lettera minuscola, un numero, un caratere speciale '/[!@#$%^&*()_+\\-=\\[\\]{};':\"\\\\|,.<>\\/?]/' e deve essere lunga almeno 8 caratteri."
        e.preventDefault()

    }
});