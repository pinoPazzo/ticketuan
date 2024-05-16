let allert = document.querySelector('#allert2');
let error = document.querySelector('#error')
allert.style.display = 'none';
const form = document.querySelector('#formino');

form.addEventListener("submit",function(e){

    console.log(form.elements["data"].value)
    let oggi = new Date();
    let dataInserita = new Date(form.elements["data"].value);
    if(dataInserita < oggi){
        allert.style.display = "block";
        error.innerHTML = "La carta è scaduta"
        e.preventDefault()
    }
    if(form.elements["cvv"].value.length === 3){
        allert.style.display = "block";
        error.innerHTML = "CVV non valido"
        e.preventDefault()
    }
});