$(document).ready(function(){
    var dataDoctor = [];
    var tableDoctor = $('#tableDoctor').DataTable({                
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
    },
    "columns": [
        { "data": "id", "autowidth": true },
        { "data": "name", "autowidth": true }

    ]
});

    $("#tableDoctor").delegate('tr', "click", function (evt) {
        $('#tableDoctor').find('tr').removeClass('active');

        $(this).toggleClass('active');
        dataDoctor = tableDoctor.row(this).data();
    });

    $('#saveDoctor').on('click', function () {
        console.log(dataDoctor);
        if(dataDoctor != undefined)
        {
            $('#doctor_id').val(dataDoctor['id']);
            $('#nameDoctor').val(dataDoctor['name']);
        }
        
    });

    $('#btnpesquisarDoctor').click(function () {
        var pesquisar = $('#searchDoctor').val();
        $.ajax({
            type: "GET",
            url: '/scheduling/jsonDoctor',
            data: { search: pesquisar },
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                tableDoctor.clear();
                tableDoctor.rows.add(data);
                tableDoctor.draw();
            }

        })
    });
});