/*****************************QR CODE SECTION************************************/
const qrcodeContainerParent = document.getElementById("qrcode-content-parent")
const qrcodeBtns = document.getElementsByClassName("qrcode-btn");
Array.from(qrcodeBtns).forEach((btn) => {
    btn.addEventListener("click", () => {
        while (qrcodeContainerParent.firstChild) {
            qrcodeContainerParent.removeChild(qrcodeContainerParent.firstChild);
        }
        const newDiv = document.createElement("div");
        newDiv.classList.add("qrcode-content");
        qrcodeContainerParent.appendChild(newDiv);
        new QRCode(newDiv, {
            text: window.location.origin + "/" + btn.getAttribute("data-code"),
            width: 512,
            height: 512,
            colorDark: '#000000',
            colorLight: '#ffffff',
            correctLevel: QRCode.CorrectLevel.H
        });
    });
});

/*****************************CREATE MODAL SECTION************************************/
const categorySelect = document.getElementById("category-select");
const addBtn = document.getElementById("add-btn");
const createModalContent = document.getElementById("create-modal-content");

categorySelect.addEventListener("change", () => {
    addBtn.classList.toggle("hidden");
    const answersInputs = document.getElementsByClassName("answer");
    console.log(answersInputs);
    Array.from(answersInputs).forEach((input) => {
        input.remove();
    })
})

addBtn.addEventListener("click", () => {
    createModalContent.insertAdjacentHTML('beforeend', `
        <div class="mb-2 flex items-center answer">
            <input type="text" name="input_options[]" id="question" class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" />
            <button type="button" class="remove-div-btn px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </button>
        </div>
    `);

    const removeBtns = createModalContent.querySelectorAll(".remove-div-btn");
    removeBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            btn.parentElement.remove();
        });
    })
});


/*****************************EDIT MODAL SECTION************************************/
const categorySelectEdit = document.getElementById("category-select-edit");
const addBtnEdit = document.getElementById("add-btn-edit");
const editModalContent = document.getElementById("answer-edit");
const editButtonForm = document.getElementById("edit-btn");

editButtonForm.addEventListener("click", () => {
    document.getElementById("edit-form").submit();
})


categorySelectEdit.addEventListener("change", () => {
    addBtnEdit.classList.toggle("hidden");
    const answersInputs = document.getElementsByClassName("answer");
    console.log(answersInputs);
    Array.from(answersInputs).forEach((input) => {
        input.remove();
    })
})

addBtnEdit.addEventListener("click", () => {
    editModalContent.insertAdjacentHTML('beforeend', `
    <div class="mb-2 flex items-center answer">
        <input type="text" name="input_options[]" id="question" class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" />
        <button type="button" class="remove-div-btn px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </button>
    </div>
    `);

    const removeBtns = editModalContent.querySelectorAll(".remove-div-btn");
    removeBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            btn.parentElement.remove();
        });
    })
});


const editButtons = document.getElementsByClassName("edit-btn");
Array.from(editButtons).forEach((button) => {
    button.addEventListener("click", () => {
        var data = JSON.parse(button.getAttribute("data-question"));
        var parsedData = JSON.parse(button.getAttribute("data-answers"))
        document.getElementById('edit-form').action =  document.getElementById('edit-form').action.replace("__question_code__", data.code);

        if (typeof parsedData === 'object' && !Array.isArray(parsedData)) {
            var dataArray = [];
            for (var key in parsedData) {
                if (parsedData.hasOwnProperty(key)) {
                    dataArray.push(parsedData[key]);
                }
            }
            var answers = dataArray;
        } else {
            var answers = parsedData;
        }

        console.log(data)
        console.log(answers)

        document.getElementById('question-edit').value = data.title;
        document.getElementById('lesson-edit').value = data.lesson;

        while (editModalContent.firstChild) {
            editModalContent.removeChild(editModalContent.firstChild);
        }

        //Set the active inputs for set/active
        document.getElementById("active-edit").querySelectorAll("option").forEach((option) => {
            if (option.value == data.active) {
                option.setAttribute("selected", "selected");
            }else {
                option.removeAttribute("selected");
            }
        })

        //Set the category inputs text/choice
        document.getElementById("category-select-edit").querySelectorAll("option").forEach((option) => {
            if (option.value == data.category) {
                option.setAttribute("selected", "selected");
                addBtnEdit.classList.remove("hidden")
            }else {
                option.removeAttribute("selected");
            }
        })

        if (data.category == "choice") {
            answers.forEach((answer) => {
                editModalContent.insertAdjacentHTML('beforeend', `
                    <div class="mb-2 flex items-center answer">
                        <input value="${answer.value}" type="text" name="input_options[]" class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" />
                        <button type="button" class="remove-div-btn px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                `);

            });
            editModalContent.querySelectorAll(".remove-div-btn").forEach((btn) => {
                btn.addEventListener("click", () => {
                    btn.parentElement.remove();
                });
            })
        }
    })
})
