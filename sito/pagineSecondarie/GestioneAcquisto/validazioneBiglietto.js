    function validateForm() {
    let expiryDate = document.getElementById('expiry-date').value;
    let cardNumber = document.getElementById('form2Example17').value.replace(/\s/g, '');
    let cvv = document.getElementById('form2Example18').value;

    let month = parseInt(expiryDate.substring(0, 2));
    let year = parseInt(expiryDate.substring(3, 7));
    let currentYear = new Date().getFullYear();
    let currentMonth = new Date().getMonth() + 1;

    let button = document.querySelector('button[type="submit"]');

    if (month > 12 || year < currentYear || (year === currentYear && month < currentMonth)) {
    button.disabled = true;
    return;
}

    if (cardNumber.length === 16 && cvv.length === 3) {
    button.disabled = false;
} else {
    button.disabled = true;
}
}

    document.getElementById('expiry-date').addEventListener('input', function(e) {
    let input = e.target.value.replace(/\D/g, '');
    if (input.length > 2) {
    input = input.substring(0, 2) + '/' + input.substring(2, 6);
}
    e.target.value = input.substring(0, 7);

    let month = parseInt(input.substring(0, 2));
    let year = parseInt(input.substring(3, 7));
    let currentYear = new Date().getFullYear();
    let currentMonth = new Date().getMonth() + 1;
    let button = document.querySelector('button[type="submit"]');

    if (month > 12 || year < currentYear || (year === currentYear && month < currentMonth)) {
    document.getElementById('allert2').style.display = 'block';
    let errorMsg = '';
    if (year < currentYear || (year === currentYear && month < currentMonth)) {
    errorMsg = 'La carta è scaduta.';
} else {
    errorMsg = 'Data di scadenza non valida. Assicurati che il mese sia tra 01 e 12.';
}
    document.getElementById('error').innerText = errorMsg;
    button.disabled = true;
} else {
    document.getElementById('allert2').style.display = 'none';
    document.getElementById('error').innerText = '';
    button.disabled = false;
}

    validateForm();
});

    document.getElementById('form2Example18').addEventListener('input', function (e) {
    let input = e.target.value.replace(/\D/g, '');
    input = input.slice(0, 3);
    e.target.value = input;

    validateForm();
});

    document.getElementById('form2Example17').addEventListener('input', function (e) {
    let input = e.target.value.replace(/\D/g, '');
    let formattedInput = input.replace(/(\d{4})/g, '$1 ');
    formattedInput = formattedInput.trim().slice(0, 19);
    e.target.value = formattedInput;

    validateForm();
});