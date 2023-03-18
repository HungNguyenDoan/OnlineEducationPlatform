<div class="container my-4 absolute">
    <div class="position-fixed bottom-0 start-0 p-3" style="z-index: 999999" id="notify-container"></div>
</div>
<script>
    //change some settings
    const notifiComponent = document.getElementById("notify-container");

    //don't touch code below if you don't know what are you doing
    const notify = {
        delayInMilliseconds: 3000,
        htmlToElement: function(html) {
            const template = document.createElement("template");
            html = html.trim();
            template.innerHTML = html;
            return template.content.firstChild;
        },
        show: function(color, message, title, delay) {
            title = title ? title : "";
            const html =
                `<div class="toast align-items-center mt-1 text-white bg-${color} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <b>${title}</b>
                                <div>${message}</div>
                            </div>
                            <button type="button" class="btn-close btn-danger me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>`;
            const toastElement = notify.htmlToElement(html);
            notifiComponent.appendChild(toastElement);
            const toast = new bootstrap.Toast(toastElement, {
                delay: delay ? delay : notify.delayInMilliseconds,
                animation: true
            });
            toast.show();
            setTimeout(() => toastElement.remove(), delay ? delay : notify.delayInMilliseconds +
                3000); // let a certain margin to allow the "hiding toast animation"
        },

        error: function(message, title, delay) {
            notify.show("danger", message, title, delay);
        },
        success: function(message, title, delay) {
            notify.show("success", message, title, delay);
        },
        warning: function(message, title, delay) {
            notify.show("warning", message, title, delay);
        },
    };
</script>
