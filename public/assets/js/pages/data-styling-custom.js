$(document).ready(function() {
    setTimeout(function() {

        // [ base style ]
        $('#base-style').DataTable();

        // [ no style ]
        $('#no-style').DataTable();

        // [ compact style ] 
        $('#compact').DataTable();

        // [ hover style ]
        $('#table-style-hover').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

    }, 350);
});
