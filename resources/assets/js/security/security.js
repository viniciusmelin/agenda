var tableUser = $('#tableUsers').DataTable();
$('#tableUsers').on('click','tbody tr',function(){
    var data = tableUser.row(this).data();
    $('#removeUser_id').val(data[0]);
    row = tableUser.row(this);
});

$('#removeUser').on('click',function(){
    $.ajax({
        url: '/user/delete',
        type: 'POST',
        data:{_token:$('input[name="_token"]').val(),id:$('#removeUser_id').val()},
        dataType: 'JSON',
        success: function(data)
        {
            $.notify(data.msg, data.class);
            tableUser.row(row).remove().draw();
            $('#modalRemoveUser').modal('toggle');
        }
    });
});