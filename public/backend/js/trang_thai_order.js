$('.chitiet_don_hang').change(function () {
    var don_hang_trangthai = $(this).val(); //this  == .chitiet_don_hang
    var don_hang_id = $(this).children(":selected").attr("id");
    var _token = $('input[name="_token"]').val();

    //lấy ra số lượng
    soluong = [];
    $("input[name='product_quantity']").each(function () {
        soluong.push($(this).val());
    });
    // //tổng tiền, lỗi do tổng tiền chứa cả int + array
    // tongtien = [];
    // $("input[name='product_total']").each(function() {
    //     tongtien.push($(this).val());
    // });
    //lấy ra product_id
    donhang_product_id = [];
    $("input[name='donhang_product_id']").each(function () {
        donhang_product_id.push($(this).val());
    });
    donhang_productsize_id = [];
    $("input[name='donhang_productsize_id']").each(function () {
        donhang_productsize_id.push($(this).val());
    });
    j = 0;
    for (i = 0; i < donhang_productsize_id.length; i++) {
        //so luong khach dat
        var donhang_qty = $('.donhang_qty_' + donhang_productsize_id[i]).val();
        //số lượng còn lại
        var donhang_qty_storage = $('.donhang_qty_storage_' + donhang_productsize_id[i]).val();

        if (parseInt(donhang_qty) > parseInt(donhang_qty_storage)) {
            j = j + 1;
            if (j == 1) {
                alert('Số lượng sản phẩm còn lại không đủ!!!');
            }
            $('.color_qty_' + donhang_productsize_id[i]).css('background', 'green');
        }
    }
    if (j == 0) {

        $.ajax({
            url: '/update-donhang-qty',
            method: 'POST',
            data: {
                _token: _token,
                don_hang_trangthai: don_hang_trangthai,
                don_hang_id: don_hang_id,
                soluong: soluong,
                // tongtien: tongtien,
                donhang_product_id: donhang_product_id,
                donhang_productsize_id: donhang_productsize_id
            },
            success: function (data) {
                alert('Thay đổi trạng thái đơn hàng thành công');
                location.reload();
            }
        });

    }

});