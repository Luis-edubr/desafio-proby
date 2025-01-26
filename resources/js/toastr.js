import toastr from 'toastr';

document.addEventListener('DOMContentLoaded', function() {
    if (window.sessionSuccess) {
        toastr.success(window.sessionSuccess);
    }
    if (window.sessionError) {
        toastr.error(window.sessionError);
    }
});