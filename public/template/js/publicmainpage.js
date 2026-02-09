$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore()
{
    const page = $('#page').val();
    $.ajax({
        data: { page },
        dataType: 'JSON',
        url: '/services/load-product',
        type: 'POST',
        success : function(result) 
        {
            if (result.html !== ''){
                $('#loadProduct').append(result.html);
                //Load xong thì nâng lên số trang +1
                $('#page').val(page + 1);  
            }
            else {
                alert('Đã load sản phẩm xong');
                $('#button-loadMore').css('display', 'none');
            }
            // console.log(result);
        
        }
    })
}

