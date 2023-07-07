$(document).ready(function () {

    chart30dayorder();

    var chart = new Morris.Bar({
        element: 'myfirstchart',
        lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766856'],
        // pointFillColors: ['#ffffff'],
        // pointStrokeColors: ['black'],
        // fillOpacity: 0.6,
        hideHover: 'auto',
        parseTime: false,
        xkey: 'period',
        ykeys: ['order', 'sales', 'profit', 'quantity'],
        // behaveLikeLine: true,
        labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']
    });

    function chart30dayorder() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/days-30ngay-order',
            method: 'POST',
            dataType: 'JSON',
            data: {
                _token: _token
            },
            success: function (data) {
                chart.setData(data);
            }
        });
    }

    $('.index-filter').change(function () {
        var index_value = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/index-admin-filter',
            method: 'POST',
            dataType: 'JSON',
            data: {
                _token: _token,
                index_value: index_value
            },
            success: function (data) {
                chart.setData(data);
            }
        });
    });

    $('#btn-dashboard-filter').click(function () {
        var _token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();

        // alert(from_date);
        // alert(to_date);

        $.ajax({
            url: '/filter-by-date',
            method: 'POST',
            dataType: 'JSON',
            data: {
                _token: _token,
                from_date: from_date,
                to_date: to_date,
            },
            success: function (data) {
                chart.setData(data);
            }
        });
    });
});