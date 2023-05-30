import { dataRender, lessonRender } from "./dataRender";
const popupHandle = (btnClass, popupId, popupField) => {
    const btnPopup = document.querySelector(btnClass);
    const popup = document.querySelector(popupId);
    const popupInput = document.querySelector(popupField);
    btnPopup.addEventListener('click', (event) => {
        event.preventDefault();
        popup.style.display = 'flex';
    })

    popup.addEventListener('click', (event) => {
        if (!popupInput.contains(event.target)) {
            popup.style.display = 'none';
        }
    });
}

const popupSubmitHandle = (submitId, dataId, popupId, type) => {
    const submitBtn = document.querySelector(submitId);
    const popup = document.querySelector(popupId);
    const data = document.querySelector(dataId);
    const validator = (data) => {
        if (!!(data)) {
            return true;
        }
        else
            return false;
    }
    let renderId = type == 'create' ? 'owner' : 'joined';
    renderId += '-class-card';
    submitBtn.addEventListener('click', (event) => {
        event.preventDefault();
        let dataType = type == 'create' ? { class_name: data.value } : { classCode: data.value };
        console.log(data.value);
        console.log(dataType);
        if (validator(data.value)) {
            $.ajax({
                type: 'POST',
                url: 'class/' + type,
                data: dataType,
                success: function (result) {
                    notify.success('success');
                    dataRender(renderId, result.data);
                    popup.style.display = 'none';
                },
                error: function (request, status, response) {
                    notify.error("Failed");
                }
            })
        }
    })
}

const lessonCreateSubmit = (submitId, formId,popupId) => {
    const submitBtn = document.getElementById(submitId);
    const popup = document.getElementById(popupId);
    submitBtn.addEventListener('click', (event) => {
        event.preventDefault();
        const form = document.getElementById(formId);
        const formData = new FormData(form);
        const url = new URL(window.location.href);
        var param = new URLSearchParams(url.search);
        var classId = param.get('id');

        formData.append('class_id', classId);
        $.ajax({
            type: 'POST',
            url: 'lesson/create',
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                let classData = JSON.parse(localStorage.getItem('classData'));
                classData.data.lesson = result.data;
                localStorage.setItem('classData', JSON.stringify(classData));
                popup.style.display ="none";
                lessonRender('lesson-data', result.data);
            },
            error: function (request, status, response) {
                notify.error("Cannot create");
            }
        });
    });
}

export { popupHandle, popupSubmitHandle, lessonCreateSubmit }