$(document).ready(function(){
    var dataPatient = [];
    var tablePatient = $('#tablePatient').DataTable({                
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
    },
    "columns": [
        { "data": "id", "autowidth": true },
        { "data": "name", "autowidth": true }

    ]
});

    $("#tablePatient").delegate('tr', "click", function (evt) {
        $('#tablePatient').find('tr').removeClass('active');

        $(this).toggleClass('active');
        dataPatient = tablePatient.row(this).data();
    });

    $('#savePatient').on('click', function () {
        console.log(dataPatient);
        if(dataPatient != undefined)
        {
            $('#patient_id').val(dataPatient['id']);
            $('#namePatient').val(dataPatient['name']);
        }
        
    });

    $('#btnpesquisarPatient').click(function () {
        var pesquisar = $('#searchPatient').val();
        $.ajax({
            type: "GET",
            url: '/scheduling/jsonPatient',
            data: { search: pesquisar },
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                tablePatient.clear();
                tablePatient.rows.add(data);
                tablePatient.draw();
            }

        })
    });
});