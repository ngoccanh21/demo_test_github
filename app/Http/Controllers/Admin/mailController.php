<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\magiamgia;
use App\Models\sanpham;
use App\Models\loaisapham;
use App\Models\khachhang;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


session_start();

class mailController extends Controller
{
    //cấu hình mail: config/mail
    //gửi mail mã giảm giá cho khách hàng thường
    public function send_magiamgia($magiamgia_code, $magiamgia_soluong, $magiamgia_loaigiamgia, $magiamgia_sotiengiam)
    {
        $khachhang = khachhang::where('khachhang_vip', 2)->get();

        $magiamgia = magiamgia::where('magiamgia_code', $magiamgia_code)->first();
        $magiamgia_ngaybatdau = $magiamgia->magiamgia_ngaybatdau;
        $magiamgia_ngayketthuc = $magiamgia->magiamgia_ngayketthuc;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $tieude_mail = "Mã khuyến mãi ngày" . ' ' . $now;
        $data = [];
        foreach ($khachhang as $k_thanhvien) {
            $data['email'][] = $k_thanhvien->khachhang_email;
        }

        $magiamgia = array(
            'magiamgia_code' => $magiamgia_code,
            'magiamgia_soluong' => $magiamgia_soluong,
            'magiamgia_loaigiamgia' => $magiamgia_loaigiamgia,
            'magiamgia_sotiengiam' => $magiamgia_sotiengiam,
            'magiamgia_ngaybatdau' => $magiamgia_ngaybatdau,
            'magiamgia_ngayketthuc' => $magiamgia_ngayketthuc
        );

        Mail::send('user.email.send_mail', ['magiamgia' => $magiamgia], function ($message) use ($tieude_mail, $data) {
            $message->to($data['email'])->subject($tieude_mail);
            $message->from($data['email'], $tieude_mail);
        });
        return redirect()->back()->with('message', 'Gửi mã khuyến mãi cho khách hàng thành viên thành công');
    }

    //gửi mã giảm giá cho khách hàng vip
    public function send_magiamgia_vip($magiamgia_code, $magiamgia_soluong, $magiamgia_loaigiamgia, $magiamgia_sotiengiam)
    {
        $khachhang_vip = khachhang::where('khachhang_vip', 1)->get();

        $magiamgia = magiamgia::where('magiamgia_code', $magiamgia_code)->first();
        $magiamgia_ngaybatdau = $magiamgia->magiamgia_ngaybatdau;
        $magiamgia_ngayketthuc = $magiamgia->magiamgia_ngayketthuc;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $tieude_mail = "Mã khuyến mãi ngày" . ' ' . $now;
        $data = [];
        foreach ($khachhang_vip as $k_vip) {
            $data['email'][] = $k_vip->khachhang_email;
        }

        $magiamgia = array(
            'magiamgia_code' => $magiamgia_code,
            'magiamgia_soluong' => $magiamgia_soluong,
            'magiamgia_loaigiamgia' => $magiamgia_loaigiamgia,
            'magiamgia_sotiengiam' => $magiamgia_sotiengiam,
            'magiamgia_ngaybatdau' => $magiamgia_ngaybatdau,
            'magiamgia_ngayketthuc' => $magiamgia_ngayketthuc
        );

        Mail::send('user.email.send_mail_vip', ['magiamgia' => $magiamgia], function ($message) use ($tieude_mail, $data) {
            $message->to($data['email'])->subject($tieude_mail);
            $message->from($data['email'], $tieude_mail);
        });
        return redirect()->back()->with('message', 'Gửi mã khuyến mãi cho khách hàng vip thành công');
    }

    //view quên khẩu khẩu
    public function quen_mat_khau()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get(); //menu
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search

        return view('user.checkout.quen_mat_khau')->with('category', $cate_product)->with('product', $all_product);
    }
    //post lấy lại mật khẩu
    public function lay_lai_mat_khau_email_post(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $tieude_mail = "Lấy lại mật khẩu Shop giày thể thao MINOSS" . ' ' . $now;
        $khachhang = khachhang::where('khachhang_email', '=', $data['email_account'])->get();
        foreach ($khachhang as $key => $value) {
            $khachhang_id = $value->khachhang_id;
        }
        if ($khachhang) {
            $khachhang_count = $khachhang->count();
            if ($khachhang_count == 0) {
                return redirect()->back()->with('error', 'Tài khoản không tồn tại. Vui lòng nhập lại email đúng!');
            } else {
                $token_radom = Str::random();
                $khachhang = khachhang::find($khachhang_id);
                $khachhang->khachhang_token = $token_radom;
                $khachhang->save();

                //gửi link mail lấy lại mật khẩu
                $to_email = $data['email_account'];
                $link_reset_matkhau = url('/update-new-matkhau?email=' . $to_email . '&token=' . $token_radom);
                $data = array("name" => $tieude_mail, "body" => $link_reset_matkhau, "email" => $data['email_account']);
                Mail::send('user.checkout.quen_mat_khau_thong_bao', ['data' => $data], function ($message) use ($tieude_mail, $data) {
                    $message->to($data['email'])->subject($tieude_mail);
                    $message->from($data['email'], $tieude_mail);
                });
                return redirect()->back()->with('message', 'Lấy lại mật khẩu thành công! Vui lòng kiếm tra email để lấy lại mật khẩu.');
            }
        }
    }
    //view mật khẩu mới
    public function update_new_matkhau()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get(); //menu
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search

        return view('user.checkout.mat_khau_moi')->with('category', $cate_product)->with('product', $all_product);
    }
    //post, insert mật khẩu  mới
    public function update_new_matkhau_post(Request $request)
    {
        $data = $request->all();
        $token_radom = Str::random();
        $khachhang = khachhang::where('khachhang_email', '=', $data['email'])->where('khachhang_token', '=', $data['token'])->get();
        $count_kh = $khachhang->count();
        if ($count_kh) {
            foreach ($khachhang as $key => $val) {
                $khachhang_id = $val->khachhang_id;
            }
            $reset = khachhang::find($khachhang_id);
            $reset->khachhang_matkhau = md5($data['account_password']);
            $reset->khachhang_token = $token_radom;
            $reset->save();
            return redirect('/login-checkout')->with('message', 'Thay đổi mật khẩu mới thành công!');
        } else {
            return redirect('/quen-mat-khau')->with('error', 'Hãy nhập email để lấy lại mật khẩu!');
        }
    }
    // public function send_mail()
    // {
    //     return view('user.email.send_donhang');
    // }

    //xac_nhan_donhang

    //test hiển thị view gửi mail
    public function mail_example()
    {
        return view('user.email.send_mail');
    }
}
