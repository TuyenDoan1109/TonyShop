$(document).ready(function () {
    // Shared lists
    new Sortable(tableLeft, {
        group: 'shared', // set both lists to same group
        handle: '.handle',
        animation: 150
    });

    new Sortable(tableRight, {
        group: 'shared',
        handle: '.handle',
        animation: 150
    });
    // END Shared lists
});
