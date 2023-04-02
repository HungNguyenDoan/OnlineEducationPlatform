import { dataRender } from "./dataRender";
// navbar handle
const dropdownButton = document.querySelector('#dropdown-button');
const dropdownMenu = document.querySelector('#dropdown-menu');
const logoutBtn = document.querySelector('#logout-btn');
dropdownButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
});
logoutBtn.addEventListener('click', (event) => {
    event.preventDefault();
    $.ajax({
        url: 'logout',
        type: 'POST',
        success: function (response) {
            // console.log('true');
            window.location.href = '/login';
        },
        error: function (jqXHR, textStatus, errorThrown) {
            window.location.href = '/login';
            // console.log('false');
        }
    })
});

// popup search handle
const searchButton = document.querySelector('.search-button');
const searchPopup = document.querySelector('#search-popup');
const fromSearch = document.querySelector('#form-search');
searchButton.addEventListener('click', (event) => {
    event.preventDefault();
    searchPopup.style.display = 'flex';
});

searchPopup.addEventListener('click', (event) => {
    if (!fromSearch.contains(event.target)) {
        searchPopup.style.display = 'none';
    }
});

//popup create handle
const createButton = document.querySelector('.create-button');
const createPopup = document.querySelector('#create-popup');
const formCreate = document.querySelector('#form-create');
createButton.addEventListener('click', (event) => {
    event.preventDefault();
    createPopup.style.display = 'flex';
});

createPopup.addEventListener('click', (event) => {
    if (!formCreate.contains(event.target)) {
        createPopup.style.display = 'none';
    }
});

// popup submit handle
const submitSearch = document.querySelector('#submit-search');
const searchData = document.getElementById('search-data');
const formValidation = (data) => {
    if (!!(data)) {
        return true;
    }
    else {
        return false;
    }
}
submitSearch.addEventListener('click', (event) => {
    event.preventDefault();
    if (formValidation(searchData.value)) {
        $.ajax({
            type: 'POST',
            url: 'class/join',
            data: {
                classCode: searchData.value
            },
            success: function (result) {
                notify.success('success');
            },
            error: function (request, status, response) {
                notify.error("Join failed");
            }
        })
    }
});

//popup create handle 
const submitCreate = document.querySelector('#submit-create');
const createData = document.getElementById('create-data');
submitCreate.addEventListener('click', (event) => {
    event.preventDefault();
    if (formValidation(createData.value)) {
        $.ajax({
            type: 'POST',
            url: 'class/create',
            data: {
                class_name: createData.value
            },
            success: function (result) {
                dataRender('class-card', result.data)
                notify.success('success');
                createPopup.style.display = 'none';
            },
            error: function (request, status, response) {
                notify.error("Create failed");
            }
        })
    }
})
