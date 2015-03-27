$(document).ready(function () {

    /**
     * First make sure all rows that have anything checked
     * also have the addon column marked as checked.
     */
    $('table td:not(:first-child) input[type="checkbox"]').each(function () {
        if ($(this).is(':checked')) {
            $(this).closest('tr').find('td:first-child input[type="checkbox"]').prop('checked', true);
        }
    });

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

        if (!$(this).closest('tr').find('td:not(:first-child) input[type="checkbox"]:checked').length) {
            $(this).closest('tr').find('td:first-child input[type="checkbox"]').prop('checked', false);
        }
    });
});