$(document).ready(function () {

    //add lượt xem sp
    $('.tangLuotXem').click(function () {
        var id = $(this).data('id_productluotxem');

        var product_id = $('.cart_product_id_' + id).val();
        var product_luotxem = $('.product_luotxem_' + id).val();
        var _token = $('input[name="_token"]').val();

        // alert(product_id);
        // alert(product_luotxem);
        // alert(_token);

        $.ajax({
            url: '/post-luot-xem-sp',
            method: 'POST',
            data: {
                product_id: product_id,
                product_luotxem: product_luotxem,
                _token: _token
            },
            success: function () {
                // swal("Thành công!", "Đơn hàng của bạn đã được huỷ thành công!", "success");

            }
        });
    });

    // add lượt xem bài viết
    $('.tangLuotXemTintuc').click(function () {
        var id = $(this).data('id_productluotxemtintuc');

        var tintuc_id = $('.tintuc_id_' + id).val();
        var tintuc_luotxem = $('.tintuc_luotxem_' + id).val();
        var _token = $('input[name="_token"]').val();

        // alert(tintuc_id);
        // alert(tintuc_luotxem);
        // alert(_token);

        $.ajax({
            url: '/post-luot-xem-tintuc',
            method: 'POST',
            data: {
                tintuc_id: tintuc_id,
                tintuc_luotxem: tintuc_luotxem,
                _token: _token
            },
            success: function () {
            }
        });
    });
});