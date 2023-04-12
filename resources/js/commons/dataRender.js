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
        // console.log(key);
        let img = Math.floor(Math.random() * 4 + 1);
        let htmlCode =
            ` <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4 cursor-pointer">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="/assets/bg-images/image-`+ img + `.png">
                        <div class="p-4 flex justify-between items-center">
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">`+ data[key].class_name + `</h2>
                </div>
            </div>
        </div>`
        container.innerHTML += htmlCode;
    }
}
export { dataRender };