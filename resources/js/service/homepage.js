import { dataRender } from "../commons/dataRender";
import { hidden } from "../commons/hiddenData";
hidden('owner-class-card', 'dropdown-owner')
hidden('joined-class-card', 'dropdown-join')

// const moreOptions = document.querySelector('#join-btn-more-0');
// console.log(moreOptions);
// const btn = document.getElementById('more-option');
// moreOptions.addEventListener('click', (event) => {
//     event.preventDefault();
//     btn.classList.toggle('hidden');
// });

window.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        type: 'GET',
        url: 'api/class/all-class',
        success: function (response) {
            dataRender('owner-class-card', response.data.owner)
            dataRender('joined-class-card', response.data.joined)
        },
        error: function (request, status,) {
        }
    })
})