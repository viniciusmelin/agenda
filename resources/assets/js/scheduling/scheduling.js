var tableScheduling = $('#tablescheduling').DataTable({    "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
}});
var row;
$('#tablescheduling').on('click','tbody tr',function(){
    var data = tableScheduling.row(this).data();
    $('#removeScheduling_id').val(data[0]);
    row = tableScheduling.row(this);
});

$('#removeScheduling').on('click',function(){
    $.ajax({
        url: '/scheduling/delete',
        type: 'POST',
        data:{_token:$('input[name="_token"]').val(),id:$('#removeScheduling_id').val()},
        dataType: 'JSON',
        success: function(data)
        {
            tableScheduling.row(row).remove().draw();
            $('#modalRemoveScheduling').modal('toggle');
        }
    });
});