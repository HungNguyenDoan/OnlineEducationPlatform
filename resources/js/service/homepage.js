import { dataRender } from "../components/dataRender";
const dropDownButton = document.getElementById('dropdown');
const classCard = document.getElementById('class-card');
dropDownButton.addEventListener('click', () => {
    console.log('123');
    if (classCard.style.display === "none") {
        classCard.style.display = "flex";
    }
    else {
        classCard.style.display = "none";
    }
});

window.onload = () => {
    $.ajax({
        type: 'GET',
        url: 'class/all-class',
        success: function (response) {
            dataRender('class-card', response.data)
        },
        error: function (request, status,) {
        }
    })
}