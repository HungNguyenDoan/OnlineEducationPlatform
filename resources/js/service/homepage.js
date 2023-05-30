import { dataRender } from "../commons/dataRender";
import { hidden } from "../commons/hiddenData";
hidden('owner-class-card', 'dropdown-owner')
hidden('joined-class-card', 'dropdown-join')

window.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        type: 'GET',
        url: 'api/class/all-class',
        success: function (response) {
            dataRender('owner-class-card', response.data.owner)
            dataRender('joined-class-card', response.data.joined)
            setTimeout(() => {
                const listOwnerClass = document.querySelectorAll(".class-detail");
                listOwnerClass.forEach(function (element) {
                    viewDetail(element);
                });
            }, 100)
        },
        error: function (request, status,) {
        }
    })
})
const viewDetail = (element) => {
    element.addEventListener("click", (event) => {
        event.preventDefault();
        $.ajax({
            url: "class/" + element.id,
            type: "GET",
            success: function (data) {
                localStorage.setItem('classData', JSON.stringify(data));
                window.location.href = "/class-detail" + "?id=" + element.id;
            },
            error: function () {
                notify.error('something wrong');
            }
        })
    })
}