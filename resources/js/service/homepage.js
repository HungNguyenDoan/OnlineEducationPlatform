import { dataRender } from "../commons/dataRender";
import { hidden } from "../commons/hiddenData";

hidden('owner-class', 'dropdown-owner')
hidden('joined-class-card', 'dropdown-join')

window.onload = () => {
    $.ajax({
        type: 'GET',
        url: 'class/all-class',
        success: function (response) {
            dataRender('owner-class', response.data.owner)
            dataRender('joined-class-card', response.data.joined)
        },
        error: function (request, status,) {
        }
    })
}