import { formatDate } from "../components/utils";
import { lessonClickHandle, downloadClickHandle } from "./clickHandler";
import { popupHandle } from "./popupHandler";
const dataRender = (id, data) => {
    const container = document.getElementById(id);
    let id_btn = "";
    if (id === 'owner-class-card') {
        id_btn = 'owner';
    }
    else {
        id_btn = 'join';
    }
    container.innerHTML = "";
    for (const key in data) {
        let img = Math.floor(Math.random() * 4 + 1);
        let htmlCode =
            ` <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4 cursor-pointer class-detail" id = "` + data[key].id + `">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="/assets/bg-images/image-`+ img + `.png">
                        <div class="p-4 flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">`+ data[key].class_name + `</h2>
                </div>
            </div>
        </div>`
        container.innerHTML += htmlCode;
    }
}

const classRender = (id, data) => {
    const container = document.getElementById(id);
    for (const key in data) {
        let htmlCode = `  
            <div class="flex-shrink-0 w-1/3 p-4 cursor-pointer">
                <div class="bg-gray-100 rounded-lg shadow-md p-4">
                    `+ "123" + `
                </div>
            </div>`
        container.innerHTML += htmlCode;
    }
}
const lessonRender = (id, data) => {
    const table = document.getElementById(id);
    table.innerHTML = "";
    if (data.length > 0) {
        for (const key in data) {
            let div = document.createElement("div");
            let lessonId = "lesson" + data[key].id;
            let lessonClass = "." + lessonId;
            div.classList.add("flex", "flex-row", "cursor-pointer", lessonId);
            let innerDivs = [
                createInnerDiv(parseInt(key) + 1),
                createInnerDiv(data[key].title),
                createInnerDiv(formatDate(data[key].start_time)),
                createInnerDiv(formatDate(data[key].end_time))
            ];

            innerDivs.forEach(innerDiv => {
                let outerDiv = document.createElement("div");
                outerDiv.classList.add("flex-1", "px-4", "py-2", "border");
                outerDiv.appendChild(innerDiv);
                div.appendChild(outerDiv);
            });

            div.addEventListener("click", () => {
                lessonClickHandle(data[key]);
                localStorage.setItem("lessonClicked", data[key].homework.id)
            });

            table.appendChild(div);
            popupHandle(lessonClass, "#detail-lesson", "#detail-field")
        }
    }
};

const createInnerDiv = (text) => {
    let innerDiv = document.createElement("div");
    innerDiv.classList.add("px-2", "py-1");
    innerDiv.textContent = text;
    return innerDiv;
};

const informationRender = (data) => {
    var classNameElement = document.querySelector('#info-class-name');
    var classCodeElement = document.querySelector('#info-class-code');
    var teacherNameElement = document.querySelector('#info-teacher-name');
    classNameElement.innerHTML = data.class.class_name;
    classCodeElement.innerHTML = data.class.class_code;
    teacherNameElement.innerHTML = data.owner_name;
}

const fileRender = (data, fileId) => {
    const container = document.getElementById(fileId);
    container.innerHTML = '';
    const file = document.createElement('div');
    file.classList.add('cursor-pointer');

    const fileName = data.url.split('/').pop();
    file.textContent = fileName;
    file.addEventListener('click', (event) => {
        event.preventDefault();
        downloadClickHandle(fileName);
    });
    container.appendChild(file);
};

const tableRender = (data, field) => {
    console.log(data);
    const fieldData = document.getElementById(field);
    var tableWrapper = document.createElement('div');
    tableWrapper.classList.add('flex', 'flex-col', 'mx-5', 'my-5', 'table');

    var headerWrapper = document.createElement('div');
    headerWrapper.classList.add('bg-gray-100', 'p-2');

    var headerRow = document.createElement('div');
    headerRow.classList.add('flex', 'flex-row', 'font-semibold');

    var headers = Object.keys(data[0]);
    for (var i = 0; i < headers.length; i++) {
        var headerCell = document.createElement('div');
        headerCell.classList.add('flex-1', 'px-4', 'py-2');
        headerCell.textContent = headers[i];
        headerRow.appendChild(headerCell);
    }

    headerWrapper.appendChild(headerRow);
    tableWrapper.appendChild(headerWrapper);

    var tableBody = document.createElement('div');
    tableBody.classList.add('border', 'table-data');

    for (var j = 0; j < data.length; j++) {
        var rowData = data[j];
        var row = document.createElement('div');
        row.classList.add('flex', 'flex-row');

        for (var k = 0; k < headers.length; k++) {
            var cell = document.createElement('div');
            cell.classList.add('flex-1', 'px-4', 'py-2');
            cell.textContent = rowData[headers[k]];
            row.appendChild(cell);
        }

        tableBody.appendChild(row);
    }

    tableWrapper.appendChild(tableBody);
    fieldData.append(tableWrapper);
}

export { dataRender, classRender, lessonRender, informationRender, fileRender, tableRender };