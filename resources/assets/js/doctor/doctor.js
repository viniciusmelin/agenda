var tableDoctor = $('#tableDoctors').DataTable({    "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
}});
var row;
$('#tableDoctors').on('click','tbody tr',function(){
    var data = tableDoctor.row(this).data();
    $('#removeDoctor_id').val(data[0]);
    row = tableDoctor.row(this);
});

$('#removeDoctor').on('click',function(){
    $.ajax({
        url: '/doctor/delete',
        type: 'POST',
        data:{_token:$('input[name="_token"]').val(),id:$('#removeDoctor_id').val()},
        dataType: 'JSON',
        success: function(data)
        {
            $.notify(data.msg, data.class);
            tableDoctor.row(row).remove().draw();
            $('#modalRemoveDoctor').modal('toggle');
        }
    });
});