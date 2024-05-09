let allert = document.querySelector('#allert2');
let error = document.querySelector('#error')
allert.style.display = 'none';

const form = document.querySelector("form");

form.addEventListener("submit",function(e){
    let pass = form.elements["pass"].value;
    console.log(pass)
    if (/[A-Z]/.test(pass) && /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(pass) && /[a-z]/.test(pass) && pass.length > 7 && /[0-9]/.test(pass)) {
        var oggi = new Date();
        var dataInserita = new Date(form.elements["data"].value);
        if(dataInserita > oggi){
            allert.style.display = "block";
            error.innerHTML = "La data inserita è futura"
            e.preventDefault()
        }

    }else{
        allert.style.display = "block";
        error.innerHTML = "Password troppo semplice"
        e.preventDefault()

    }
});