$(document).ready(function() {
    $('.find-game').keydown(function(event) {
        if (event.which == 13) {
            this.form.submit();
            event.preventDefault();
         }
    });
});