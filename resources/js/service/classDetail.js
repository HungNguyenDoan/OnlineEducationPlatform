import { deleteClickHandle } from "../commons/clickHandler";
import { classRender, lessonRender, informationRender, tableRender } from "../commons/dataRender";
import { popupHandle } from "../commons/popupHandler";
import { lessonCreateSubmit } from "../commons/popupHandler";
// animation clicking buttons
const buttons = document.querySelectorAll('.nav-btn');
const className = document.getElementById('class-name');
const classData = JSON.parse(localStorage.getItem('classData'));
className.innerHTML = classData.data.class.class_name;
// console.log(classData.data.lesson);
lessonRender('lesson-data', classData.data.lesson);
informationRender(classData.data);

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        const target = button.getAttribute('data-target');
        buttons.forEach((btn) => {
            if (btn.getAttribute('data-target') !== target) {
                btn.classList.remove('active');
            } else {
                btn.classList.add('active');
            }
        });
    });
});
//handle each button
const btnMaterial = document.getElementById('btn-material');
const btnAddLesson = document.getElementById('btn-add-lesson');
const btnHomework = document.getElementById('btn-homework');
const btnList = document.getElementById('btn-list');
const lessonList = document.getElementById('lesson-list')
const deleteLesson = document.getElementById('delete-lesson');
const submitionField = document.getElementById('submition-field');
const studentField = document.getElementById('student-display');
const homeworkField = document.getElementById('homework-display');
const submition = document.getElementById('submition-file');
submition.addEventListener('click', (event) => {
    event.preventDefault(); 
    const file = document.getElementById('file-submit');
    const selectedFile = file.files[0];
    const fileData = new FormData();
    fileData.append('file', selectedFile);
    fileData.append('homework_id', localStorage.getItem('lessonClicked'));
    console.log(fileData);
    $.ajax({
        type: 'POST',
        url: 'submit',
        data: fileData,
        processData: false,
        contentType: false,
        success: function (result) {
        },
        error: function (request, status, response) {
            notify.error("Cannot create");
        }
    });
    console.log(true);
});
studentField.style.display = "none"
homeworkField.style.display = "none"
if (!classData.data.is_owner) {
    btnAddLesson.style.display = "none";
    deleteLesson.style.display = "none";
    submitionField.style.display = "flex";
    btnList.style.display = "none";
}
else {
    submitionField.style.display = "none";
}
popupHandle('.btn-add-lesson', '#create-lesson-popup', '#form-add-lesson');
popupHandle('.show-information', '#information-popup', '#information-field');
// popupHandle('.btn-add-homework','#create')
btnMaterial.addEventListener('click', (event) => {
    event.preventDefault();
    if (classData.data.is_owner) {
        btnAddLesson.style.display = "block";
    }
    lessonList.style.display = "flex";
    studentField.style.display = "none"
    homeworkField.style.display = "none"
});
btnHomework.addEventListener('click', (event) => {
    event.preventDefault();
    lessonList.style.display = "none";
    btnAddLesson.style.display = "none";
    homeworkField.style.display = "flex"
    studentField.style.display = "none"
});
btnList.addEventListener('click', (event) => {
    event.preventDefault();
    btnAddLesson.style.display = "none";
    lessonList.style.display = "none";
    homeworkField.style.display = "none"
    studentField.style.display = "flex"
});
tableRender(classData.data.homework, 'homework-display');
tableRender(classData.data.student, 'student-display');
deleteClickHandle(localStorage.getItem("lessonClicked"), "delete-lesson", "detail-lesson");
lessonCreateSubmit('lesson-submit', 'lesson-create-form', 'create-lesson-popup');
