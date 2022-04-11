let signInButton = document.getElementById("signInButton");
let signUpButton = document.getElementById("signUpButton");
let selectButtonsContainer = document.querySelector(".selectButtons");
let mainPartAuthorization = document.querySelector(".mainPart");

signInButton.onclick = () => {
    if (!signInButton.classList.contains("active"))
    {
        signInButton.classList.add("active");
        signUpButton.classList.remove("active");
        selectButtonsContainer.classList.remove("state2");
        selectButtonsContainer.classList.add("state1");
        mainPartAuthorization.classList.remove("state2");
        mainPartAuthorization.classList.add("state1");

    }
}

signUpButton.onclick = () => {
    if (!signUpButton.classList.contains("active"))
    {
        signInButton.classList.remove("active");
        signUpButton.classList.add("active");
        selectButtonsContainer.classList.add("state2");
        selectButtonsContainer.classList.remove("state1");
        mainPartAuthorization.classList.add("state2");
        mainPartAuthorization.classList.remove("state1");
    }
}