<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\thanhpho;
use App\Models\quanhuyen;
use App\Models\xaphuong;
use App\Models\phiship;
use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\shipping;
use App\Models\khachhang;
use App\Models\magiamgia;
use App\Models\sanpham;
use App\Models\thongke;
use Illuminate\Support\Carbon;
use App\Models\Roles;
use App\Models\Admin;
use App\Models\productsize;
use App\Models\size;

use Illuminate\Support\Facades\App;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Exports\DonhangExport;
use Maatwebsite\Excel\Facades\Excel;

session_start();

class orderController extends Controller
{
    public function AuthLogin()
    {
        //$admin_id = Session::get('admin_id');
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('/index');
        } else {
            return Redirect::to('/login')->send();
        }
    }
    //view all đơn hàng
    public function view_donhang()
    {
        $donhang = donhang::orderby('created_at', 'DESC')->get();
        return view('admin.order.all_donhang')->with(compact('donhang'));
    }
    //view chi tiết đh
    public function view_chitiet_donhang($don_hang_code)
    {
        $chitiet_donhang = chitietdonhang::with('product')->where('don_hang_code', $don_hang_code)->get();
        $donhang = donhang::where('don_hang_code', $don_hang_code)->get();
        foreach ($donhang as $key => $d_hang) {
            $khachhang_id = $d_hang->khachhang_id;
            $shipping_id = $d_hang->shipping_id;
            $don_hang_trangthai = $d_hang->don_hang_trangthai;
            $ngaytao_dh = $d_hang->created_at;
            $donhang_code = $d_hang->don_hang_code;
        }
        $khachhang = khachhang::where('khachhang_id', $khachhang_id)->first();
        $shipping = shipping::where('shipping_id', $shipping_id)->first();
        $ngaytao_dh = donhang::where('created_at', $ngaytao_dh)->first();
        $donhang_code = donhang::where('don_hang_code', $donhang_code)->first();

        $chitiet_dh_product = chitietdonhang::with('product')->where('don_hang_code', $don_hang_code)->get();

        foreach ($chitiet_dh_product as $key => $order_d) {

            $product_magiamgia = $order_d->product_magiamgia;
        }
        if ($product_magiamgia != '0') {
            $magiamgia = magiamgia::where('magiamgia_code', $product_magiamgia)->first();
            $magiamgia_loaigiamgia = $magiamgia->magiamgia_loaigiamgia;
            $magiamgia_sotiengiam = $magiamgia->magiamgia_sotiengiam;
        } else {
            $magiamgia_loaigiamgia = 2;
            $magiamgia_sotiengiam = 0;
        }

        return view('admin.order.chitiet_donhang')->with(compact('chitiet_donhang', 'donhang', 'khachhang', 'shipping', 'magiamgia_loaigiamgia', 'magiamgia_sotiengiam', 'don_hang_trangthai', 'donhang_code', 'ngaytao_dh'));
    }

    //in đơn hàng pdf
    public function print_donhang($checkout_code)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_donhang_convert($checkout_code));

        return $pdf->stream();
    }
    //view in đơn hàng pdf
    public function print_donhang_convert($checkout_code) //lỗi ko lấy đc ảnh
    {
        $chitiet_donhang = chitietdonhang::with('product')->where('don_hang_code', $checkout_code)->get();
        $donhang = donhang::where('don_hang_code', $checkout_code)->get();
        foreach ($donhang as $key => $d_hang) {
            $khachhang_id = $d_hang->khachhang_id;
            $shipping_id = $d_hang->shipping_id;
            $don_hang_trangthai = $d_hang->don_hang_trangthai;
            $ngaytao_dh = $d_hang->created_at;
            $donhang_code = $d_hang->don_hang_code;
        }
        $khachhang = khachhang::where('khachhang_id', $khachhang_id)->first();
        $shipping = shipping::where('shipping_id', $shipping_id)->first();
        $ngaytao_dh = donhang::where('created_at', $ngaytao_dh)->first();
        $donhang_code = donhang::where('don_hang_code', $donhang_code)->first();

        $chitiet_dh_product = chitietdonhang::with('product')->where('don_hang_code', $checkout_code)->get();

        foreach ($chitiet_dh_product as $key => $order_d) {

            $product_magiamgia = $order_d->product_magiamgia;
        }
        if ($product_magiamgia != '0') {
            $magiamgia = magiamgia::where('magiamgia_code', $product_magiamgia)->first();
            $magiamgia_loaigiamgia = $magiamgia->magiamgia_loaigiamgia;
            $magiamgia_sotiengiam = $magiamgia->magiamgia_sotiengiam;

            // if ($magiamgia_loaigiamgia == 1) {
            //     $magiamgia_sotiengiam_echo = $magiamgia_sotiengiam . '%';
            // } elseif ($magiamgia_loaigiamgia == 2) {
            //     $magiamgia_sotiengiam_echo = number_format($magiamgia_sotiengiam, 0, ',', '.') . 'đ';
            // }
        } else {
            $magiamgia_loaigiamgia = 2;
            $magiamgia_sotiengiam = 0;

            // $magiamgia_sotiengiam_echo = '0';
        }

        //$output_shipping_hinhthuc = '';

        $output = '';
        $output .= ' <style>
        *{ font-family: DejaVu Sans ;}
        </style>
        <h3><center>Cộng hoà xã hội chủ nghĩa Việt Nam</center></h3>
        <h4><center>Độc lập - Tự do - Hạnh phúc</center></h4>
        <h3><center>Shop giày thể thao MINOSS</center></h3>
        <h5><center>--------------------</center></h5>
        <h3 style="text-transform:uppercase;"><center>Đơn đặt hàng</center></h3>
        <h5 style="text-transform:uppercase;"><center>Mã: ';
        $output .= '' . $donhang_code->don_hang_code . '';
        $output .= '</center></h5>

        <h5><center><i>Kính gửi:</i> ';
        $output .= '' . $khachhang->khachhang_ten . '';
        $output .= '</center></h5>

        <span><center>Anh/chị ';
        $output .= '' . $khachhang->khachhang_ten . '';
        $output .= ' đã đặt hàng tại shop giày thể thao MINOSS theo mẫu trên.</center></span>
        <span>------------------------------------------------------------------------------------------------------------------------</span>
        <table class="table" style="font-size:12px;width:100%">
                            <thead>
                                <tr style="width:100%;">
                                    <th style="width:48%;">Từ</th>
                                    <th style="width:48%;">Đến</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="width:100%;">
                                    <td style="width:48%;">Shop giày thể thao MINOSS</td>
                                    <td style="width:48%;">';
        $output .= '' . $shipping->shipping_ten . '';
        $output .= '</td>
                                </tr>                            
                                <tr style="width:100%;">
                                    <td style="width:48%;">Email: minoss@gmail.com</td>
                                    <td style="width:48%;">Email: ';
        $output .= '' . $shipping->shipping_email . '';
        $output .= '</td>
                                </tr>
                                <tr style="width:100%;">
                                    <td style="width:48%;font-weight:bold;">SĐT: 0123456789</td>
                                    <td style="width:48%;font-weight:bold;">SĐT: ';
        $output .= '' . $shipping->shipping_sdt . '';
        $output .=
            '</td>
                                </tr>
                                <tr style="width:100%;">
                                    <td style="width:48%;">Địa chỉ: Nhân Hoà - Mỹ Hào - Hưng Yên</td>
                                    <td style="width:48%;">Địa chỉ: ';
        $output .= '' . $shipping->shipping_diachi . '';
        $output .=
            '</td>
                                </tr>
                                 </tr>
                                <tr style="width:100%;">
                                    <td style="width:48%;"></td>
                                    <td style="width:48%;">Ghi chú: ';
        $output .= '' . $shipping->shipping_ghichu . '';
        $output .= '</td>
                                </tr>
                            </tbody>
                        </table>
        <span>------------------------------------------------------------------------------------------------------------------------</span><br><br>
        <span>------------------------------------------------------------------------------------------------------------------------</span><br>
        <span>- Nội dung đặt hàng như sau: </span>
        <table class="table" style="font-size:13px;width:100%;border:1px solid black;">
                            <thead>
                                <tr>
                                    <th style="border:1px solid black;">STT</th>
                                    <th style="border:1px solid black;">Tên sản phẩm</th>
                                    <th style="border:1px solid black;">Kích cỡ</th>
                                    <th style="border:1px solid black;">Giá bán</th>
                                    <th style="border:1px solid black;">Số lượng</th>
                                    <th style="border:1px solid black;">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>';
        $total = 0;
        foreach ($chitiet_dh_product as $index => $ctdh) {
            $subtotal = $ctdh->product_giaban * $ctdh->product_quantity;
            $total += $subtotal;
            $index = $index + 1;
            $output .= '
                             <tr style="width:100%;">
                                    <td style="border:1px solid black;">' . $index . '</td>
                                    <td style="border:1px solid black;">' . $ctdh->product_ten . '</td>
                                    <td style="border:1px solid black;">' . $ctdh->product_size . '</td>
                                    <td style="border:1px solid black;">' . number_format($ctdh->product_giaban, 0, ',', '.') . ' vnđ' . '</td>
                                    <td style="border:1px solid black;">' . $ctdh->product_quantity . '</td>
                                    <td style="border:1px solid black;">' . number_format($subtotal, 0, ',', '.') . ' vnđ' . '</td>
                                </tr>';
        }

        $total_after_end = 0;
        if ($magiamgia_loaigiamgia == 1) {
            $total_coupon = ($total * $magiamgia_sotiengiam) / 100;
            $total_after_end = $total + $ctdh->product_phiship - $total_coupon;
        } else {
            $total_coupon = $magiamgia_sotiengiam;
            $total_after_end = $total + $ctdh->product_phiship - $magiamgia_sotiengiam;
        }

        $output .= '  
                                <tr style="width:100%;">
                                    <td colspan="4" style="padding: 0px 0px 0px 10px;">Tổng tiền: <span style="">' . number_format($total, 0, ',', '.') . '</span> vnđ</td>
                                    <td colspan="3" rowspan="4">Ngày đặt hàng: <span style="">';
        $output .= '' . $ngaytao_dh->created_at . '';
        $output .= '</span></td>
                                </tr>
                                
                                <tr style="width:100%;">
                                    <td colspan="7"style="padding: 0px 0px 0px 10px;" >
                                        Giảm giá: <span>' . number_format($total_coupon, 0, ',', '.') . ' vnđ</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="padding: 0px 0px 0px 10px;">Phí vận chuyển: <span style="">' . number_format($ctdh->product_phiship, 0, ',', '.') . '</span> vnđ</td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="padding: 0px 0px 0px 10px;">Tổng tiền thanh toán: <span style="">' . number_format($total_after_end, 0, ',', '.') . '</span> vnđ</td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr style="width:100%;">
                                    <td colspan="7" style="padding: 0px 0px 0px 20px;">
                                       <span style="">Lưu ý:</span>
                                       <ul>
                                           <li>Được kiểm tra hàng trước khi thanh toán</li>
                                           <li>Không tự ý đổi trả, bom hàng</li>
                                           <li>Khách hàng quay video lại để làm bằng chứng nếu có sai sót</li>
                                       </ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <span>- Thông tin thanh toán: </span><br>
                        <span style="padding: 0px 0px 0px 20px;font-size:14px;">+ Hình thức thanh toán: ';

        if ($shipping->shipping_hinhthuc == 1) {
            $output_shipping_hinhthuc = 'Thanh toán khi nhận hàng';
        } else if ($shipping->shipping_hinhthuc == 0) {
            $output_shipping_hinhthuc = 'Thanh toán bằng thẻ ATM';
        }
        $output .= '' . $output_shipping_hinhthuc . '';
        $output .= '</span><br><br>
                    <span style="font-size: 13px;"><b>- Shop giày thể thao MINOSS xin cảm ơn quý khách đã mua hàng bên shop! Nếu có bất cứ thắc mắc gì hãy liên hệ: 0123456789 để được tư vấn và hỗ trợ.</span></p>
        
        ';

        return $output;
    }
    //export file excel
    public function export_csv_donhang()
    {
        return Excel::download(new DonhangExport, 'donhang.xlsx');
    }


    //update số lượng đơn hàng, doanh số
    //0: đơn hàng chờ xác nhận, 1: đơn hàng đẫ xác nhận, 2: đơn hàng đã giao, 3: đơn hàng bị huỷ bởi shop, 4: đơn hàng bị huỷ bởi kh
    public function update_donhang_qty(Request $request)
    {
        //cập nhật trạng thái đơn hàng
        $data = $request->all();
        $donhang = donhang::find($data['don_hang_id']);
        $donhang->don_hang_trangthai = $data['don_hang_trangthai'];
        $donhang->save();


        //order ngày đặt
        $donhang_ngaydat = $donhang->donhang_ngaydat;
        $thongke = thongke::where('donhang_ngaydat', $donhang_ngaydat)->get();
        if ($thongke) {
            $thongke_count = $thongke->count();
        } else {
            $thongke_count = 0;
        }

        //nếu đơn hàng đã giao
        if ($donhang->don_hang_trangthai == 2) {
            $sales = 0;
            $profit = 0;
            $quantity = 0;
            $total_order = 0;

            // foreach ($data['donhang_product_id'] as $key => $product_id) {

            //     $sanpham = sanpham::find($product_id);
            //     //$product_soluong = $sanpham->product_soluong;
            //     $product_soluongban = $sanpham->product_soluongban;

            //     $product_giaban = $sanpham->product_giaban;
            //     $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            //     foreach ($data['soluong'] as $key2 => $qty) {
            //         if ($key == $key2) {
            //             // $pro_remain = $product_soluong - $qty;
            //             // $sanpham->product_soluong = $pro_remain;
            //             $sanpham->product_soluongban = $product_soluongban + $qty;
            //             $sanpham->save();

            //             //update doanh thu
            //             $quantity += $qty;
            //             $total_order = 1;
            //             //$total_order += 1;
            //             $sales += $product_giaban * $qty;
            //             $profit = $sales * 0.3;
            //         }
            //     }
            // }

            foreach ($data['donhang_productsize_id'] as $key3 => $productsize_id) {

                foreach ($data['donhang_product_id'] as $key => $product_id) {
                    $sanpham = sanpham::find($product_id);
                    $product_giaban = $sanpham->product_giaban;

                    $productsize = productsize::find($productsize_id);
                    $productsize_soluongban = $productsize->soluongban;

                    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

                    foreach ($data['soluong'] as $key2 => $qty) {
                        //if ($key == $key2)
                        if ($key == $key3) {
                            // $pro_remain = $product_soluong - $qty;
                            // $sanpham->product_soluong = $pro_remain;//pro_remain: số luọng có
                            $productsize->soluongban = $productsize_soluongban + $qty;
                            //$sanpham->save();
                            $productsize->save();

                            //update doanh thu
                            $quantity += $qty; //tổng số lượng sản phẩm
                            $total_order = 1;
                            //$total_order += 1;
                            $sales += $product_giaban * $qty; //doanh thu
                            $profit = $sales * 0.3; //lợi nhuận
                        }
                    }
                }
            }

            //nếu đã có ngày đặt trong bảng thống kê thì cọng tất cả doanh thu, số lượng, số lượng đơn hàng... 
            if ($thongke_count > 0) {
                $thongke_update = thongke::where('donhang_ngaydat', $donhang_ngaydat)->first();
                $thongke_update->sales = $thongke_update->sales + $sales;
                $thongke_update->profit = $thongke_update->profit + $profit;
                $thongke_update->quantity = $thongke_update->quantity + $quantity;
                $thongke_update->total_order = $thongke_update->total_order + $total_order;
                $thongke_update->save();

                //nếu chưa có ngày đặt tồn tại trong bảng thống kê
            } else {
                $thongke_update = new thongke();
                $thongke_update->sales = $sales;
                $thongke_update->donhang_ngaydat = $donhang_ngaydat;
                $thongke_update->profit = $profit;
                $thongke_update->quantity = $quantity;
                $thongke_update->total_order = $total_order;
                $thongke_update->save();
            }

            //nếu khách huỷ, shop huỷ, chưa xác nhận đơn
        } elseif ($donhang->don_hang_trangthai == 3 || $donhang->don_hang_trangthai == 0 || $donhang->don_hang_trangthai == 4) {
            // foreach ($data['donhang_product_id'] as $key => $product_id) {

            //     $sanpham = sanpham::find($product_id);
            //     $product_soluong = $sanpham->product_soluong;
            //     $product_soluongban = $sanpham->product_soluongban;
            //     foreach ($data['soluong'] as $key2 => $qty) {
            //         if ($key == $key2) {
            //             $pro_remain = $product_soluong + $qty;
            //             $sanpham->product_soluong = $pro_remain;
            //             $sanpham->product_soluongban = $product_soluongban - $qty;
            //             $sanpham->save();
            //         }
            //     }
            // }

            //nếu xác nhận đơn hàng
        } elseif ($donhang->don_hang_trangthai == 1) {
            foreach ($data['donhang_productsize_id'] as $key => $productsize_id) {

                //$sanpham = sanpham::find($product_id);
                //$product_soluong = $sanpham->product_soluong;

                $productsize = productsize::find($productsize_id);
                $productsize_quantity = $productsize->quantity;


                //$product_soluongban = $sanpham->product_soluongban;
                foreach ($data['soluong'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain = $productsize_quantity - $qty; //pro_remain: số luọng có
                        //$sanpham->product_soluong = $pro_remain;
                        //// $sanpham->product_soluongban = $product_soluongban + $qty;
                        //$sanpham->save();


                        $productsize->quantity = $pro_remain;
                        $productsize->save();
                    }
                }
            }



            //send đơn hàng
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $tieude_mail = "Đơn hàng xác nhận ngày" . ' ' . $now;
            $khachhang = khachhang::where('khachhang_id', $donhang->khachhang_id)->first();
            $data['email'][] = $khachhang->khachhang_email;


            //lấy thông tin sản phẩm

            foreach ($data['donhang_product_id'] as $key => $product) {
                $product_mail = sanpham::find($product);
                foreach ($data['soluong'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $cart_array[] = array(
                            'product_ten' => $product_mail['product_ten'],
                            'product_giaban' => $product_mail['product_giaban'],
                            'product_qty' => $qty,
                            'product_size' => $product_mail['product_size']
                        );
                    }
                }
            }


            //lấy thông tin vận chuyển, phí vận chuyển, mã giảm giá
            $detail_donhang = chitietdonhang::where('don_hang_code', $donhang->don_hang_code)->first();
            $phi_sip = $detail_donhang->product_phiship;
            $magiamgia_mail = $detail_donhang->product_magiamgia;
            $shipping = shipping::where('shipping_id', $donhang->shipping_id)->first();

            $shipping_array = array(
                'khachhang_ten' => $khachhang->khachhang_ten,
                'phi_van_chuyen' => $phi_sip,
                'shipping_ten' => $shipping->shipping_ten,
                'shipping_sdt' => $shipping->shipping_sdt,
                'shipping_email' => $shipping->shipping_email,
                'shipping_hinhthuc' => $shipping->shipping_hinhthuc,
                'shipping_diachi' => $shipping->shipping_diachi,
                'tentp' => $shipping->shipping_tentp,
                'tenqh' => $shipping->shipping_tenqh,
                'tenxa' => $shipping->shipping_tenxa,
                'shipping_ghichu' => $shipping->shipping_ghichu
            );

            //lấy mã giảm giá và mã đơn hàng
            $donhangcode_mail = array(
                'magiamgia_code' => $magiamgia_mail,
                'don_hang_code' => $detail_donhang->don_hang_code
            );

            Mail::send('user.email.xac_nhan_donhang', ['cart_array' => $cart_array, 'shipping_array' => $shipping_array, 'donhangcode_mail' => $donhangcode_mail], function ($message) use ($tieude_mail, $data) {
                $message->to($data['email'])->subject($tieude_mail);
                $message->from($data['email'], $tieude_mail);
            });
        }
    }



    //bumbummen99
    //tất cả đơn hàng
    public function show_donhang()
    {

        $this->AuthLogin();
        $all_order = DB::table('tbl_don_hang')
            ->join('tbl_khachhang', 'tbl_don_hang.khachhang_id', '=', 'tbl_khachhang.khachhang_id')
            ->select('tbl_don_hang.*', 'tbl_khachhang.khachhang_ten')
            ->orderby('tbl_don_hang.don_hang_id', 'desc')->get();
        $show_donhang  = view('admin.order.all_donhang')->with('all_order', $all_order);
        return view('layout_admin')->with('admin.order.all_donhang', $show_donhang);
    }

    //chi tiết đơn hàng
    public function view_ctdh($order_id)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_don_hang')
            ->join('tbl_khachhang', 'tbl_don_hang.khachhang_id', '=', 'tbl_khachhang.khachhang_id')
            ->join('tbl_shipping', 'tbl_don_hang.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_chitiet_don_hang', 'tbl_don_hang.don_hang_id', '=', 'tbl_chitiet_don_hang.don_hang_id')
            ->join('tbl_payment', 'tbl_don_hang.payment_id', '=', 'tbl_payment.payment_id')
            ->select('tbl_don_hang.*', 'tbl_khachhang.*', 'tbl_shipping.*', 'tbl_chitiet_don_hang.*', 'tbl_payment.*')->first();

        $show_donhang_by_id  = view('admin.order.chitiet_donhang')->with('order_by_id', $order_by_id);
        return view('layout_admin')->with('admin.order.chitiet_donhang', $show_donhang_by_id);
    }
}
