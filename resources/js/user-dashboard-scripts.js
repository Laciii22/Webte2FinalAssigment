/*****************************CREATE MODAL SECTION************************************/
const createUserForm = document.getElementById("create-user-form");
const createButton = document.getElementById("crt-btn");
const errorMessage = document.getElementById("error-message");


createButton.addEventListener('click', function(event) {
    event.preventDefault();

    const emailInput = document.getElementById("email");
    const nameInput = document.getElementById("name");
    const passwordInput = document.getElementById("password");

    let valid = true;
    let message = "";

    if (emailInput.value.trim() === '') {
        valid = false;
        message += "Email field cannot be empty. ";
    }

    if (nameInput.value.trim() === '') {
        valid = false;
        message += "Name field cannot be empty. ";
    }

    if (passwordInput.value.trim() === '') {
        valid = false;
        message += "Password field cannot be empty. ";
    }

    if (!valid) {
        errorMessage.textContent = message;
        errorMessage.classList.remove("hidden");
        return;
    }

    errorMessage.classList.add("hidden");
    createUserForm.submit();
});

/*****************************EDIT MODAL SECTION************************************/
const editUserForm = document.getElementById("edit-user-form");
const editButton = document.getElementById("edit-btn");
const errorMessageEdit = document.getElementById("error-message-edit");

const emailInputEdit = document.getElementById("email-edit");
const nameInputEdit = document.getElementById("name-edit");
const adminInputEdit = document.getElementById("is-admin-select-edit");
const passwordInputEdit = document.getElementById("password-edit");

const editButtons = document.getElementsByClassName("edit-btn");
Array.from(editButtons).forEach((button) => {
    button.addEventListener("click", () => {
        var data = JSON.parse(button.getAttribute("data-user"));
        console.log(data);
        document.getElementById('edit-user-form').action =  document.getElementById('edit-user-form').action.replace("__user_id__", data.id);

        emailInputEdit.value = data.email;
        nameInputEdit.value = data.name

        adminInputEdit.querySelectorAll("option").forEach((option) => {
            if (option.value == data.active) {
                option.setAttribute("selected", "selected");
            }else {
                option.removeAttribute("selected");
            }
        })
    })
})


editButton.addEventListener('click', function(event) {
    event.preventDefault();

    let valid = true;
    let message = "";

    if (emailInputEdit.value.trim() === '') {
        valid = false;
        message += "Email field cannot be empty. ";
    }

    if (nameInputEdit.value.trim() === '') {
        valid = false;
        message += "Name field cannot be empty. ";
    }

    if (passwordInputEdit.value.trim() === '') {
        valid = false;
        message += "Password field cannot be empty. ";
    }

    if (!valid) {
        errorMessageEdit.textContent = message;
        errorMessageEdit.classList.remove("hidden");
        return;
    }

    errorMessageEdit.classList.add("hidden");
    createUserForm.submit();
});
