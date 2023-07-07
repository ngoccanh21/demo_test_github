$(document).ready(function () {
    //select lấy tỉnh, quận, xã -- delivery
    $('.choose').on('change', function () {
        var action = $(this).attr('id'); // atrr lấy thuộc tính id
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';

        if (action == 'thanhpho') {
            result = 'quanhuyen';
        } else {
            result = 'xaphuong';
        }
        $.ajax({
            url: '/select-vanchuyen-checkout',
            method: 'POST',
            data: {
                action: action,
                ma_id: ma_id,
                _token: _token
            },
            success: function (data) {
                $('#' + result).html(data); //khi chọn tp thì qh nhận dl, khi chọn qh thì xp nhận dữ liệu,'#' + result thay cho id của tp, qh, xp
            }
        });
    });

    //tính phí vận chuyển
    $('.tinh_phi_van_chuyen').click(function () {
        var matp = $('.thanhpho').val();
        var maqh = $('.quanhuyen').val();
        var xaid = $('.xaphuong').val();
        var _token = $('input[name="_token"]').val();
        if (matp == '' && maqh == '' && xaid == '') {
            //alert('Hãy chọn đúng địa chỉ để tiếp tục thanh toán...');
            swal("Thất bại!", "Hãy chọn đúng địa chỉ để tiếp tục thanh toán!", "error");
        } else {
            $.ajax({
                url: 'checkout-tinh-phi-ship',
                method: 'POST',
                data: {
                    matp: matp,
                    maqh: maqh,
                    xaid: xaid,
                    _token: _token
                },
                success: function () {
                    location.reload();
                }
            });
        }
    });
});