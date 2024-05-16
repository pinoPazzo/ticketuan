document.getElementById('expiry-date').addEventListener('input', function(e) {
    let input = e.target.value.replace(/\D/g, '');
    if (input.length > 2) {
        input = input.substring(0, 2) + '-' + input.substring(2, 6);
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
});

document.getElementById('form2Example18').addEventListener('input', function (e) {
    let input = e.target.value.replace(/\D/g, '');
    input = input.slice(0, 3);
    e.target.value = input;

    let button = document.querySelector('button[type="submit"]');
    if (input.length === 3) {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
});
