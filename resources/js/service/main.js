$(document).ready(() => {
    const BASE_URL = '/api/';
    // Intercept all AJAX requests to add the base URL and handle 401 errors
    $(document).ajaxSend(function (event, xhr, options) {
        options.url = BASE_URL + options.url;
    });
    $(document).ajaxError(function (event, xhr, settings, thrownError) {
        if (xhr.status === 401) {
            // Redirect to login page
            window.location.href = '/login';
        }
    });
})