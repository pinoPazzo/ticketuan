const passError = document.getElementById("passError");
const dataError = document.getElementById("dataError");
const form = document.querySelector("form");
console.log("fdfddd")

form.addEventListener("submit",function(e){

    if (form.elements["pass"].value.length<8 || !/[\W+]/.test(form.elements["pass"].value)) {
        passError.textContent = "La password deve contenere almeno 8 caratteri tra cui un simbolo";
        e.preventDefault();
    }
    var oggi = new Date();

    var dataInserita = new Date(form.elements["data"].value);
    if(dataInserita > oggi){
        dataError.textContent = "la data inserita non deve essere futura";
        e.preventDefault();
    }
});