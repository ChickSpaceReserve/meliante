const currencyInputs = document.querySelectorAll('.precos');

currencyInputs.forEach(input => {
    const max = parseFloat(input.getAttribute('data-max'));

    input.addEventListener('input', formatCurrency);

    function formatCurrency() {
        let rawValue = input.value.replace(/[^0-9]/g, '');

        // Handle the case when all numbers are deleted and NaN is generated
        if (rawValue === '') {
            rawValue = 0;
        } else {
            // Limit the raw value to the specified maximum
            rawValue = Math.min(max, parseFloat(rawValue));
        }

        const formattedValue = formatCurrencyValue(rawValue);

        input.value = formattedValue;
    }

    function formatCurrencyValue(rawValue) {
        const numericValue = Number(rawValue) / 100;

        const formattedValue = numericValue.toLocaleString('pt-BR', {
            style: 'currency',
            currency: 'BRL',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        });

        return formattedValue;
    }
});

let menuOpenFiltro = false;

let toggleFiltroMenu = function (){

    let getFormContent = document.querySelector(".filtro_form");

    let width = window. innerWidth

    if (width < 1200){ 
        if (!menuOpenFiltro) {
            getFormContent.style.maxHeight = "5000px";
            getFormContent.style.opacity = "1";
            getFormContent.style.visibility = "visible";
            getFormContent.style.overflow = "auto";
            menuOpenFiltro = true;
        } else {
            getFormContent.style.maxHeight = "0px";
            getFormContent.style.opacity = "0";
            getFormContent.style.visibility = "hidden";
            getFormContent.style.overflow = "hidden";
            menuOpenFiltro = false;
        }
    }
}

let mediaQueryFiltro = window.matchMedia('(max-width: 768px)');
mediaQueryFiltro.addEventListener('change', function (e) {

    let getFormContent = document.querySelector(".filtro_form");

    if (e.matches) {
        getFormContent.style.maxHeight = "0px";
        getFormContent.style.opacity = "0";
        getFormContent.style.visibility = "hidden";
        getFormContent.style.overflow = "hidden";
        menuOpenFiltro = false;
    } else {
        getFormContent.style.maxHeight = "unset";
        getFormContent.style.opacity = "1";
        getFormContent.style.visibility = "visible";
        getFormContent.style.overflow = "auto";
        menuOpenFiltro = false;
    }
});