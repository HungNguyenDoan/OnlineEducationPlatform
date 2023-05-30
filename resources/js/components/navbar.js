import { popupHandle, popupSubmitHandle } from "../commons/popupHandler";
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
popupHandle('.search-button', '#search-popup', '#form-search')
//popup create handle
popupHandle('.create-button', '#create-popup', '#form-create')
// popup submit handle
popupSubmitHandle('#submit-search', '#search-data', '#search-popup', 'join')
//popup create handle 
popupSubmitHandle('#submit-create', '#create-data', '#create-popup', 'create')
