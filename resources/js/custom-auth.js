 $(document).ready(function () {
    $('button').click(function () {
        $(this).attr('disabled', 'disabled')
        $(this).empty();
        $(this).append(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span class="sr-only">Loading...</span>
        `);
        $('form').submit();
    });
});
