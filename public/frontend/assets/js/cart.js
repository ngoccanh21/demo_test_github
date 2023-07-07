
//cart -- ajax
$(document).ready(function () {

    // add to cart -- ajax
    $('.add-to-cart').click(function () {
        var id = $(this).data('id_product');
        var cart_product_id = $('.cart_product_id_' + id).val();
        var cart_product_ten = $('.cart_product_ten_' + id).val();
        var cart_product_anh = $('.cart_product_anh_' + id).val();
        var cart_product_giaban = $('.cart_product_giaban_' + id).val();
        //var cart_product_size = $('.cart_product_size_' + id).val();
        //var cart_product_soluong = $('.cart_product_soluong_' + id).val();

        var cart_product_size = $('.productsize-ten-hidden').val();
        var cart_product_soluong = $('.productsize-qty-hidden').val();
        var cart_productsize_id = $('.productsize-id-hidden').val();

        var cart_product_qty = $('.cart_product_qty_' + id).val();
        var _token = $('input[name="_token"]').val();

        if (parseInt(cart_product_qty) > parseInt(cart_product_soluong)) {
            swal("Thất bại", "Thêm giỏ hàng thất bại do số lượng bạn thêm vượt quá " + cart_product_soluong + " sản phẩm", "error");
        } else {
            $.ajax({
                url: '/add-to-cart-ajax',
                method: 'POST',
                data: {
                    cart_product_id: cart_product_id,
                    cart_product_ten: cart_product_ten,
                    cart_product_anh: cart_product_anh,
                    cart_product_giaban: cart_product_giaban,
                    cart_product_size: cart_product_size,
                    cart_product_soluong: cart_product_soluong,
                    cart_productsize_id: cart_productsize_id,
                    cart_product_qty: cart_product_qty,
                    _token: _token
                },
                success: function (data) {

                    swal({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        //text: "Tiếp tục xem sản phẩm hoặc đi đến giỏ hàng???",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đến giỏ hàng?",
                        cancelButtonText: "Xem tiếp?",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                        function (isConfirm) {
                            if (isConfirm) {
                                window.location.href = "/cart-ajax";
                            } else {
                                swal("Cảm ơn", "Tiếp tục mua sắm)", "success");
                            }
                        });
                }
            });
        }
    });

    //delete cart ajax
    $('.delete-cart-ajax').click(function () {
        swal("Xoá sản phẩm!", "Xoá sản phẩm thành công!", "success");
    });
});

