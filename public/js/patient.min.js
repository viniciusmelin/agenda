var tablePatient = $('#tablepatient').DataTable({    "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
}});
var row;
$('#tablepatient').on('click','tbody tr',function(){
    var data = tablePatient.row(this).data();
    $('#removePatient_id').val(data[0]);
    row = tablePatient.row(this);
});

$('#removePatient').on('click',function(){
    $.ajax({
        url: '/patient/delete',
        type: 'POST',
        data:{_token:$('input[name="_token"]').val(),id:$('#removePatient_id').val()},
        dataType: 'JSON',
        success: function(data)
        {
            tablePatient.row(row).remove().draw();
            $('#modalRemovePatient').modal('toggle');
        }
    });
});