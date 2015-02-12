$(document).ready(function () {

    /**
     * Toggle all addon permission
     * when addon is changed.
     */
    $('table td:first-child input[type="checkbox"]').change(function () {
        $(this).closest('tr').find('td input[type="checkbox"]').prop('checked', $(this).is(':checked'));
    });

    /**
     * Assure addon is checked if any
     * of it's permissions are checked.
     */
    $('table td:not(:first-child) input[type="checkbox"]').change(function () {
        if ($(this).is(':checked')) {
            $(this).closest('tr').find('td:first-child input[type="checkbox"]').prop('checked', true);
        }
    });
});