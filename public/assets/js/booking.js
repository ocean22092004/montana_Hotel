document.addEventListener('DOMContentLoaded', function () {
    const checkInDateInput = document.getElementById('checkInDate');
    const checkOutDateInput = document.getElementById('checkOutDate');
    const priceInput = document.getElementById('price');

    const hourlyBookButton = document.getElementById('hourlyBookButton');
    const nightlyBookButton = document.getElementById('nightlyBookButton');
    const dailyBookButton = document.getElementById('dailyBookButton');

    const hourlyPriceValue = parseFloat(document.getElementById('hourlyPriceValue').value);
    const nightlyPriceValue = parseFloat(document.getElementById('nightlyPriceValue').value);
    const dailyPriceValue = parseFloat(document.getElementById('dailyPriceValue').value);
    
    const processPaymentForm = document.getElementById('processPaymentForm');
    const onlinePaymentForm = document.getElementById('onlinePaymentForm');

    function formatDateToLocalISO(date) {
        const offset = date.getTimezoneOffset();
        const adjustedDate = new Date(date.getTime() - offset * 60 * 1000);
        return adjustedDate.toISOString().slice(0, 16);
    }

    function calculatePrice() {
        const checkInDate = new Date(checkInDateInput.value);
        const checkOutDate = new Date(checkOutDateInput.value);
        const differenceInHours = (checkOutDate - checkInDate) / (60 * 60 * 1000);

        let price;
        
        if (differenceInHours <= 8) {
            price = differenceInHours * hourlyPriceValue;
        } else if (differenceInHours > 8 && differenceInHours <= 12) {
            price = nightlyPriceValue + (differenceInHours - 8) * hourlyPriceValue;
        } else {
            price = dailyPriceValue + (differenceInHours - 12) * hourlyPriceValue;
        }

        priceInput.value = Math.round(price);
        syncInputValues(processPaymentForm, onlinePaymentForm);
    }

    function syncInputValues(sourceForm, targetForm) {
        const inputs = sourceForm.querySelectorAll('input[name]');
        inputs.forEach(input => {
            const targetInput = targetForm.querySelector(`input[name="${input.name}"]`);
            if (targetInput) {
                targetInput.value = input.value;
            }
        });
    }

    checkOutDateInput.addEventListener('input', calculatePrice);
    checkInDateInput.addEventListener('input', calculatePrice);

    hourlyBookButton.addEventListener('click', (event) => {
        event.preventDefault();
        const checkInDate = new Date(checkInDateInput.value);
        const checkOutDate = new Date(checkInDate.getTime() + 3 * 60 * 60 * 1000);
        checkOutDateInput.value = formatDateToLocalISO(checkOutDate);
        priceInput.value = (3 * hourlyPriceValue);
        syncInputValues(processPaymentForm, onlinePaymentForm);
    });

    nightlyBookButton.addEventListener('click', (event) => {
        event.preventDefault();
        const checkInDate = new Date(checkInDateInput.value);
        const checkOutDate = new Date(checkInDate.getTime() + 8 * 60 * 60 * 1000);
        checkOutDateInput.value = formatDateToLocalISO(checkOutDate);
        priceInput.value = nightlyPriceValue;
        syncInputValues(processPaymentForm, onlinePaymentForm);
    });

    dailyBookButton.addEventListener('click', (event) => {
        event.preventDefault();
        const checkInDate = new Date(checkInDateInput.value);
        const checkOutDate = new Date(checkInDate.getTime() + 12 * 60 * 60 * 1000);
        checkOutDateInput.value = formatDateToLocalISO(checkOutDate);
        priceInput.value = dailyPriceValue;
        syncInputValues(processPaymentForm, onlinePaymentForm);
    });

    processPaymentForm.addEventListener('input', () => {
        syncInputValues(processPaymentForm, onlinePaymentForm);
    });

    processPaymentForm.addEventListener('change', () => {
        syncInputValues(processPaymentForm, onlinePaymentForm);
    });

    syncInputValues(processPaymentForm, onlinePaymentForm);
});
