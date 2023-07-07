// Khi thay đổi size thì qty thay đổi -- chi tiết sp
$(document).ready(function () {
    $('.chooseprosize').on('change', function () {
        var action = $(this).attr('id');

        var size_id = $(this).val();
        //var productsize_id = $('.productsize_id').val();
        //var productsize_quantity = $('.productsize_quantity').val();
        var _token = $('input[name="_token"]').val();
        var product_id = $('.product-id-size-hidden').val();
        var result = '';

        if (action == 'chooseprosize_quantity') {
            result = 'productsize_id';
        }

        // alert(action);
        // alert(size_id);
        // alert(_token);
        // //alert(result);
        // alert(productsize_id);
        // alert(productsize_quantity);

        $.ajax({
            url: '/select-chitietsp-prosize',
            method: 'POST',
            data: {
                action: action,
                size_id: size_id,
                product_id: product_id,
                _token: _token
            },
            success: function (data) {
                $('#' + result).html(data);
            }
        });

    });
});