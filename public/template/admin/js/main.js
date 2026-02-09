$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if(confirm('Xóa thì sẽ không khôi phục lại được. Bạn có chắc chắn?')){
        $.ajax({
            url: url,
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            success: function(result){
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại!');
                }
            },
            // error: function(xhr, status, error){
            //     alert('Có lỗi xảy ra. Vui lòng thử lại.');
            // }
        });
    }
}





/* Upload a file */
$('#upload').change(function(){
    // console.log(123);
    var form = new FormData();
    var file = $('#upload')[0].files[0];
    form.append('file', file);
    console.log(form)
    $.ajax({
        url: '/admin/products/upload_services',
        type: 'POST',
        dataType: 'JSON',
        processData: false,
        contentType: false,
        data: form,
        success: function(results){
            //console.log(results);
            if(results.error === false){
                $('#image_show').html('<a href="' + results.url + '" target="_blank">'+ 
                    '<img src="' + results.url + '" width="100px"></a>');
                
                $('#thumb').val(results.url);
            } else {
                alert('Ảnh tải lên lỗi vui lòng thử lại!');
            }
        }
    });
});