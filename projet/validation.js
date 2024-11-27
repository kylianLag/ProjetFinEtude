function validateNoSpecialChars(input) {
    const invalidChars = /[^a-zA-Z0-9_@!*$/]/;

    if (invalidChars.test(input.value)) {
        alert("Ce champ ne permet que les lettres, chiffres et les caractères suivants : @, !, *, $.");
        return false;
    }
    return true;
}

// valider mot de passe
function validatePassword(input) {
    const password = input.value;
    const minLength = 12;
    const uppercase = /[A-Z]/;
    const number = /[0-9]/;
    const specialChar = /[!@#$%^&*]/; 

    let errors = [];

    if (password.length < minLength) {
        errors.push("Le mot de passe doit contenir au moins 12 caractères.");
    }
    if (!uppercase.test(password)) {
        errors.push("Le mot de passe doit contenir au moins une majuscule.");
    }
    if (!number.test(password)) {
        errors.push("Le mot de passe doit contenir au moins un chiffre.");
    }
    if (!specialChar.test(password)) {
        errors.push("Le mot de passe doit contenir au moins un caractère spécial parmi !, @, #, $, %, ^, &, *.");
    }

    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    return true;
}

// validation du formulaire
function validateForm(event) {
    const pseudoInput = document.querySelector('#pseudo');
    const emailInput = document.querySelector('#email');
    const passwordInput = document.querySelector('#mdp');

    let isValid = true;
    if (!validateNoSpecialChars(pseudoInput)) {
        isValid = false;
    }
    if (!validatePassword(passwordInput)) {
        isValid = false;
    }
    if (!isValid) {
        event.preventDefault();
    }
}
function addFormValidation() {
    const form = document.querySelector('form');
    form.addEventListener('submit', validateForm);
}
document.addEventListener('DOMContentLoaded', addFormValidation);
