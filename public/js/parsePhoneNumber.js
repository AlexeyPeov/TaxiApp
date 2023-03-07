
//prevents the weird erasing bug
let previousValue = "";

document.getElementById("phoneNumber").addEventListener("input", function(event) {
    let currentValue = event.target.value;

    // Check if characters were deleted from the input element
    if (currentValue.length < previousValue.length) {
        // If characters were deleted, update previousValue and exit early
        previousValue = currentValue;
        return;
    }

    let formattedValue = currentValue.replace(/\D/g, "");
    if (formattedValue.length > 11) {
        // truncate it to 11 digits
        formattedValue = formattedValue.slice(0, 11);
    }
    formattedValue =
        "+ "
        + formattedValue.slice(0, 1)
        + " (" + formattedValue.slice(1, 4) + ") "
        + formattedValue.slice(4, 6) + " "
        + formattedValue.slice(6, 8) + " "
        + formattedValue.slice(8);

    previousValue = formattedValue;
    event.target.value = formattedValue;
});
