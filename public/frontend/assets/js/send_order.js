$(document).ready(function () {
    //đặt hàng
    $('.send_order').click(function () {
        swal({
            title: "Xác nhận đặt hàng",
            text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Cảm ơn! Mua hàng",
            cancelButtonText: "Đóng!!!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
            function (isConfirm) {
                if (isConfirm) {
                    var shipping_ten = $('.shipping_ten').val();
                    var shipping_sdt = $('.shipping_sdt').val();
                    var shipping_email = $('.shipping_email').val();
                    var shipping_hinhthuc = $('.shipping_hinhthuc').val();
                    var shipping_diachi = $('.shipping_diachi').val();

                    var shipping_matp = $('.shipping_matp').val();
                    var shipping_maqh = $('.shipping_maqh').val();
                    var shipping_xaid = $('.shipping_xaid').val();

                    var shipping_ghichu = $('.shipping_ghichu').val();
                    var order_magiamgia = $('.order_magiamgia').val();
                    var order_phivanchuyen = $('.order_phivanchuyen').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: '/add-order',
                        method: 'POST',
                        data: {
                            shipping_ten: shipping_ten,
                            shipping_sdt: shipping_sdt,
                            shipping_email: shipping_email,
                            shipping_hinhthuc: shipping_hinhthuc,
                            shipping_diachi: shipping_diachi,
                            shipping_matp: shipping_matp,
                            shipping_maqh: shipping_maqh,
                            shipping_xaid: shipping_xaid,
                            shipping_ghichu: shipping_ghichu,
                            _token: _token,
                            order_magiamgia: order_magiamgia,
                            order_phivanchuyen: order_phivanchuyen
                        },
                        success: function () {
                            swal("Thành công!", "Đơn hàng của bạn đã được đặt thành công!", "success");
                        }
                    });

                    window.setTimeout(function () {
                        location.reload();
                    }, 3000); //đặt hàng thành công, 3s sau reload lại trang.

                } else {
                    swal("Đóng", "Đơn hàng chưa được gửi!", "error");

                }

            });



    });
});