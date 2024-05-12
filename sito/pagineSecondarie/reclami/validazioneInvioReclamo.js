let allert = document.querySelector('#allert2');
let error = document.querySelector('#error')
allert.style.display = 'none';

const form = document.querySelector("form");

form.addEventListener("submit",function(e){

    let oggi = new Date();
    let dataInserita = new Date(form.elements["data"].value);
    if(dataInserita > oggi){
        allert.style.display = "block";
        error.innerHTML = "La data inserita è futura"
        e.preventDefault()
    }
});