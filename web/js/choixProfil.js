$(function () {
    var state = true;
    $('#artiste').click(function () {
        if (state === true) {
            $(this).removeClass('btn-primary').addClass('btn-danger');
        } else {
            $(this).removeClass('btn-danger').addClass('btn-primary');
        }
        state = !state;
    });
});
