$(document).ready(function () {

    fetch_delivery();

    function fetch_delivery() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/select-phiship',
            method: 'POST',
            data: {
                _token: _token
            },
            success: function (data) {
                $('#load_phivanchuyen').html(data);
            }
        });
    }
    $(document).on('blur', '.phi_phiship_edit', function () {

        var phiship_id = $(this).data('phiship_id');
        var phiship_value = $(this).text();
        var _token = $('input[name="_token"]').val();
        // alert(feeship_id);
        // alert(fee_value);
        $.ajax({
            url: '/update-phiship',
            method: 'POST',
            data: {
                phiship_id: phiship_id,
                phiship_value: phiship_value,
                _token: _token
            },
            success: function (data) {
                fetch_delivery();
            }
        });

    });
    $('.add_phivanchuyen').click(function () {

        var thanhpho = $('.thanhpho').val();
        var quanhuyen = $('.quanhuyen').val();
        var xaphuong = $('.xaphuong').val();
        var phi_ship = $('.phi_ship').val();
        var _token = $('input[name="_token"]').val();
        // alert(city);
        // alert(province);
        // alert(wards);
        // alert(fee_ship);
        $.ajax({
            url: '/insert-phiship',
            method: 'POST',
            data: {
                thanhpho: thanhpho,
                quanhuyen: quanhuyen,
                xaphuong: xaphuong,
                _token: _token,
                phi_ship: phi_ship
            },
            success: function (data) {
                fetch_delivery();
            }
        });


    });
    $('.choose').on('change', function () {
        var action = $(this).attr('id'); // atrr lấy thuộc tính id
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';
        // alert(action);
        //  alert(matp);
        //   alert(_token);

        if (action == 'thanhpho') {
            result = 'quanhuyen';
        } else {
            result = 'xaphuong';
        }
        $.ajax({
            url: '/select-vanchuyen',
            method: 'POST',
            data: {
                action: action,
                ma_id: ma_id,
                _token: _token
            },
            success: function (data) {
                $('#' + result).html(
                    data
                ); //khi chọn tp thì qh nhận dl, khi chọn qh thì xp nhận dữ liệu,'#' + result thay cho id của tp, qh, xp
            }
        });
    });
    //cắt 3 kí tự 'vnđ'khi focus vào ô phí ship 
    $(document).on('focus', '.phi_phiship_edit', function (e) {
        var phiship_value = $(this).text();
        phiship_value = phiship_value.replace('.', '');
        phiship_value = phiship_value.slice(0, phiship_value.length - 3);
        e.target.innerText = phiship_value;
    });
})