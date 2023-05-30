import { fileRender, lessonRender } from "./dataRender";
const clickHandler = (btn) => {
    btn.addEventListener('click', (event) => {
        event.preventDefault();
        const buttons = document.querySelectorAll('button');
        buttons.forEach(button => {
            button.classList.remove('bg-red-500', 'rounded-lg');
        });
        btn.classList.add('bg-red-500', 'rounded-lg');
    })
}

const lessonClickHandle = (data) => {
    console.log(data.materials);
    // const popup = document.getElementById(popup);
    let title = document.getElementById("title");
    title.innerHTML = data.title;
    let startTime = document.getElementById("start-time");
    startTime.innerHTML = data.start_time;
    let endTime = document.getElementById("end-time");
    endTime.innerHTML = data.end_time;
    let submitTime = document.getElementById("submit-time");
    submitTime.innerHTML = data.homework.end_time;
    fileRender(data.materials, "material-data");
    fileRender(data.homework, "homework-data");
}

const downloadClickHandle = (path) => {
    const downloadUrl = '/api/material/download?path=' + path;

    const link = document.createElement('a');
    link.href = downloadUrl;
    link.setAttribute('download', '');
    link.style.display = 'none';

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
const deleteClickHandle = (lessonId, btnId, popupId) => {
    const popup = document.getElementById(popupId);
    const deleteLesson = document.getElementById(btnId);
    deleteLesson.addEventListener('click', (event) => {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'lesson/delete',
            data: {
                lesson_id: lessonId,
            },
            success: function (result) {
                let classData = JSON.parse(localStorage.getItem('classData'));
                classData.data.lesson = result.data;
                localStorage.setItem('classData', JSON.stringify(classData));
                popup.style.display = "none";
                lessonRender("lesson-data", result.data);
                notify.success("success");
            },
            error: function (request, status,) {
            }
        })
    });
}
export { clickHandler, lessonClickHandle, downloadClickHandle, deleteClickHandle }