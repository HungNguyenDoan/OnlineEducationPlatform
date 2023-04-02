const dataRender = (id, data) => {
    const container = document.getElementById(id);
    container.innerHTML = "";
    for (const key in data) {
        let img = Math.floor(Math.random() * 4 + 1);
        let htmlCode =
            `<div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="/assets/bg-images/image-`+ img + `.png">
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">`+ data[key].class_name + `</h2>
                </div>
            </div>`
        container.innerHTML += htmlCode;
    }
}
export { dataRender };