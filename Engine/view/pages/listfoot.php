</table>
<script>
    $('document').ready(function(){    
        $('#music').dataTable( {
            "pagingType": "full_numbers",
            "language": {
                "sProcessing": "Bezig...",
                "sLengthMenu": "_MENU_ resultaten weergeven",
                "sZeroRecords": "Geen resultaten gevonden",
                "sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
                "sInfoEmpty": "Geen resultaten om weer te geven",
                "sInfoFiltered": " (gefilterd uit _MAX_ resultaten)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sEmptyTable": "Geen resultaten aanwezig in de tabel",
                "sInfoThousands": ".",
                "sLoadingRecords": "Een moment geduld aub - bezig met laden...",
                "oPaginate": {
                    "sFirst": "Eerste",
                    "sLast": "Laatste",
                    "sNext": "Volgende",
                    "sPrevious": "Vorige"
                },
                searchPlaceholder: "Zoeken"
            }
        });
    });
</script>