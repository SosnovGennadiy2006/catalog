let xhr = new XMLHttpRequest();
let email_input = document.getElementById('email_input');
let emailErrors = document.querySelector(".TextElement_emailError");

email_input.oninput = () => {


    let email_parts = email_input.value.split('@');
    if (email_parts.length === 2 && email_parts[0] !== '' && email_parts[1] !== '')
    {
        xhr.open('POST', `http://catalog/xmlhttprequest/users/email/${email_parts[1]}/${email_parts[0]}`);
        xhr.send();
    }
}

xhr.onload = function() {
    emailErrors.innerHTML = xhr.response;
};