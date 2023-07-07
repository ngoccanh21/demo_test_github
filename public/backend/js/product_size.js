$(document).ready(function () {

    load_soluong_size();

    function load_soluong_size() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/select-load-prouctsize',
            method: 'POST',
            data: {
                _token: _token
            },
            success: function (data) {
                $('#load_productsize').html(data);
            }
        });
    }

    $('.choosesize').on('change', function () {
        var action = $(this).attr('id'); // atrr lấy thuộc tính id
        var masize = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';
        // alert(action);
        // alert(masize);
        // alert(_token);
    });
    $('.productsize').click(function () {
        var id_pro = $(this).data('id_product');
        //var id_size = $(this).data('id_size');

        var product_id = $('.product_id_' + id_pro).val();
        var product_ten = $('.product_ten_' + id_pro).val();
        var size_id = $('.size_id').val();
        var quantity = $('.quantity').val();
        var _token = $('input[name="_token"]').val();

        // alert(product_id);
        // alert(size_id);
        // alert(_token);
        // alert(quantity);


        $.ajax({
            url: '/post-product-size',
            method: 'POST',
            data: {
                product_id: product_id,
                product_ten: product_ten,
                size_id: size_id,
                quantity: quantity,
                _token: _token
            },
            success: function () {
                swal("Thành công!", "Thêm số lượng size thành công!", "success");
                //location.reload();
                //alert("Thêm số lượng cho sản phẩm:" + product_ten + "thành công!");
            }
        });
        window.setTimeout(function () {
            location.reload();
        }, 2000);
    });


});