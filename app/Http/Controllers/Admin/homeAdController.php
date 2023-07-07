<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\donhang;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Laravel\Socialite\Facades\Socialite;
use App\Models\login;
use App\Models\social;
use App\Rules\Captcha;
use Illuminate\Validation\Validator;

use App\Models\thongke;
use Illuminate\Support\Carbon;
use App\Models\khachhang;
use App\Models\sanpham;
use App\Models\tintuc;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;


//AIzaSyDTVZrSGvPY1NLd2LeZY09S-kuIT8lbIGQ
//cuongnguyenduc1611@gmail.com
// key:6LdLM_UlAAAAAM2ydr8A_5AC466cuTXNKc6ugmuW  , key_secret:6LdLM_UlAAAAAE3wUxLH5GOz-BLwaaR4QvRiixmr
//http://localhost:8000/login

session_start();

class homeAdController extends Controller
{

    // thống kê - statistical DB::table('tbl_statistical')->
    //thống kê theo datepicker--bảng chọn ngày
    // public function thonketesst()
    // {
    //     $thongke = thongke::orderby('id_statistical', 'DESC')->get();
    //     return view('admin.index')->with(compact('thongke'));
    // }

    //nếu không có kết quả thì sẽ lỗi ở netwwork và không trả ra kết quả gì
    //lọc theo datepicker
    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $output = 'Không có kết quả';

        $get = thongke::whereBetween('donhang_ngaydat', [$from_date, $to_date])->orderBy('donhang_ngaydat', 'ASC')->get();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->donhang_ngaydat,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
    }
    //lọc dữ liệu theo <option>
    public function index_admin_filter(Request $request) //chưa xong
    {
        $data = $request->all();

        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s'); //d: day, m: month, y: year

        $dau_thangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString(); //subMonth trừ đi tháng
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString(); //subDays(7): trừ đi 7 ngày
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        // $dau_thang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->startOfMonth()->toDateString();
        // $cuoi_thang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->endOfMonth()->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['index_value'] == '7ngay') {
            $get = thongke::whereBetween('donhang_ngaydat', [$sub7days, $now])->orderBy('donhang_ngaydat', 'ASC')->get();
        } elseif ($data['index_value'] == 'thangtruoc') {
            $get = thongke::whereBetween('donhang_ngaydat', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('donhang_ngaydat', 'ASC')->get();
        } elseif ($data['index_value'] == 'thangnay') {
            $get = thongke::whereBetween('donhang_ngaydat', [$dau_thangnay, $now])->orderBy('donhang_ngaydat', 'ASC')->get();
        } else {
            $get = thongke::whereBetween('donhang_ngaydat', [$sub365days, $now])->orderBy('donhang_ngaydat', 'ASC')->get();
        }

        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->donhang_ngaydat,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
    }
    //
    public function days_30ngay_order()
    {
        //$data = $request->all();
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subMonths(1)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = thongke::whereBetween('donhang_ngaydat', [$sub30days, $now])->orderBy('donhang_ngaydat', 'ASC')->get();

        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->donhang_ngaydat,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
    }


    //login admin with google
    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback_google()
    {
        $users = Socialite::driver('google')->user();
        //$users = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateUser($users, 'google');
        $login_gg_new = login::where('admin_email', $users->email)->first();
        if ($authUser) {
            $account_name = login::where('admin_id', $authUser->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_email', $account_name->admin_email);
            Session::put('admin_id', $account_name->admin_id);
        } elseif ($login_gg_new) {
            $account_name = login::where('admin_id', $authUser->user)->first();
            Session::put('admin_name', $account_name->admin_name);
            Session::put('admin_email', $account_name->admin_email);
            Session::put('admin_id', $account_name->admin_id);
        }

        return redirect('/index')->with('message', 'Đăng nhập Admin thành công bằng tài khoản google');
    }
    public function findOrCreateUser($users, $provider)
    {
        $authUser = social::where('provider_user_id', $users->id)->first();
        if ($authUser) {

            return $authUser;
        } else {
            $login_gg_new = new social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);

            $orang = login::where('admin_email', $users->email)->first();

            if (!$orang) { //nếu chưa tồn tại email thì thêm vào các trường admin_name, admin_email
                $orang = login::create([
                    'admin_name' => $users->name,
                    'admin_email' => $users->email,
                    'admin_password' => '',
                    'admin_phone' => ''

                ]);
            }

            $login_gg_new->login()->associate($orang); //lấy khoá chính bên tbl_admin insert vào khoá ngoại tbl_social

            $login_gg_new->save();
            return $login_gg_new;
        }

        //return redirect('/index')->with('message', 'Đăng nhập Admin thành công bằng tài khoản google');
    }

    // //login favebook lỗi do chưa cấu hình tên miền
    // public function login_facebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }
    // //http://localhost:8000/login/callback
    // public function callback_facebook()
    // {
    //     $provider = Socialite::driver('facebook')->user();
    //     $account = social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
    //     if ($account) {
    //         //login in vao trang quan tri  
    //         $account_name = login::where('admin_id', $account->user)->first();
    //         Session::put('admin_name', $account_name->admin_name);
    //         //Session::put('admin_email', $account_name->admin_email);
    //         Session::put('admin_id', $account_name->admin_id);
    //         return redirect('/index')->with('message', 'Đăng nhập Admin thành công');
    //     } else {

    //         $admin_login = new social([
    //             'provider_user_id' => $provider->getId(),
    //             'provider' => 'facebook'
    //         ]);

    //         $orang = login::where('admin_email', $provider->getEmail())->first();

    //         if (!$orang) {
    //             $orang = login::create([
    //                 'admin_name' => $provider->getName(),
    //                 'admin_email' => $provider->getEmail(),
    //                 'admin_password' => '',
    //                 'admin_phone' => ''

    //             ]);
    //         }
    //         $admin_login->login()->associate($orang);
    //         $admin_login->save();

    //         $account_name = login::where('admin_id', $account->user)->first();
    //         Session::put('admin_name', $account_name->admin_name);
    //         //Session::put('admin_email', $account_name->admin_email);
    //         Session::put('admin_id', $account_name->admin_id);
    //         return redirect('/index')->with('message', 'Đăng nhập Admin thành công');
    //     }
    // }

    //login admin bằng session
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
    //view admin
    //Provider/AppServiceProvider : khai báo cho tất cả vui
    public function index()
    {
        $this->AuthLogin();

        $donhang_count = donhang::all()->count();
        $khachhang_count = khachhang::all()->count();
        $tong_sanpham = sanpham::all()->count();

        $thongke = thongke::all();
        $tong_loinhuan = $thongke->sum('profit');

        $luotxem_sp = sanpham::orderby('product_luotxem', 'DESC')->take(10)->get();
        $luotxem_tt = tintuc::orderby('tintuc_luotxem', 'DESC')->take(10)->get();

        return view('admin.index')->with(compact('donhang_count', 'khachhang_count', 'tong_loinhuan', 'tong_sanpham', 'luotxem_sp', 'luotxem_tt'));
    }
    public function login()
    {
        return view('login_admin');
    }
    public function admin_home(Request $request) //post
    {
        //đăng nhặp có mã captcha
        // $data = $request->validate([
        //     'admin_email' => 'required',
        //     'admin_password' => 'required',
        //     'g-recaptcha-response' => new Captcha(),         //dòng kiểm tra Captcha
        // ]);

        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = login::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if ($login) {
            $login_count = $login->count();
            if ($login_count > 0) {
                Session::put('admin_name', $login->admin_name);
                Session::put('admin_email', $login->admin_email);
                Session::put('admin_id', $login->admin_id);
                return Redirect::to('/index');
            }
        } else {
            Session::put('message', 'Tài khoản, mật khẩu không chính xác. Hãy thử lại!!!');
            return Redirect::to('/login');
        }

        //cách 2, ko gọi đến model
        // $admin_email = $request->admin_email;
        // $admin_password = md5($request->admin_password);

        // //$result = DB::table('tbl_admin')->where('admin_email', $admin_email)
        // $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        // if ($result) {
        //     //nếu tk , mk đúng thì thêm các trường tên, email 
        //     Session::put('admin_name', $result->admin_name);
        //     Session::put('admin_email', $result->admin_email);
        //     Session::put('admin_id', $result->admin_id);
        //     return Redirect::to('/index');
        // } else {
        //     Session::put('message', 'Tài khoản, mật khẩu không chính xác. Hãy thử lại!!!');
        //     return Redirect::to('/login');
        // }

    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_email', null);
        Session::put('admin_id', null);
        return Redirect::to('/login');
        //return view('login_admin');
    }

    // echo '<pre>';
    // print_r($result);
    // echo '<pre>';
}
