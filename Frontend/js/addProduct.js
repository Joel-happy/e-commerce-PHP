function validatePrice(input) {
    // Replace any non-numeric characters except the decimap point
    input.value = input.value.replace(/[^0-9.]/g, '');

    // Limit the input to two decimal places
    let parts = input.value.split('.');
    if (parts.length > 1) {
        // Keep only the first two characters after the decimal point
        parts[1] = parts[1].slice(0,2);
        input.value = parts.join('.');
    }

    // Ensure only one decimal point is allowed
    let nbDecimalPoints = input.value.split('.').length - 1;
    if (nbDecimalPoints > 1) {
        input.value = input.value.substring(0, input.value.lastIndexOf('.'));
    }
}
