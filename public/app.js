$(document).ready(function () {
    $.ajax({
        url: 'october-metal-mayhem',
        type: 'GET',
        cache: false,
        success: function (response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.log(xhr);
        }
    })
});