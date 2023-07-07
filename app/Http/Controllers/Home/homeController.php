<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\loaisapham;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\magiamgia;
use App\Models\sanpham;
use Illuminate\Support\Carbon;
use App\Models\khachhang;
use App\Models\chitietdonhang;
use App\Models\shipping;
use App\Models\donhang;
use App\Models\tintuc;
use App\Models\banner;
use App\Models\size;
use App\Models\productsize;


session_start();

class homeController extends Controller
{

    //view trang chủ
    public function home(Request $request)
    {
        //seo meta
        // $meta_keyword = "giay the thao minoss, giay the thao cho gioi tre";
        // $meta_description = "Shop chuyên bán giày dành cho những bạn trẻ, những bạn đam mê giày thể thao";
        // $meta_title = "MINOSS - Shop bán giày thể thao MINOSS";
        // $url_canonical = $request->url();
        //seo meta

        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get(); //menu
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->paginate(8); //->limit(8)->get(); sp và search
        $tintuc = tintuc::where('tintuc_trangthai', '1')->orderby('tintuc_id', 'desc')->limit(5)->get();
        $banner_home = banner::where('banner_trangthai', '1')->orderby('banner_id', 'desc')->limit(3)->get();


        //sản phẩm view nhiều
        $sanpham_view_nhieu = sanpham::where('product_trangthai', '1')->orderby('product_luotxem', 'DESC')->take(6)->get();



        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }
        //cách 1
        return view('user.home')->with('category', $cate_product)->with('product', $all_product)->with(compact('count_cart_mini', 'tintuc', 'sanpham_view_nhieu', 'banner_home'));
        //return view('user.home')->with('category', $cate_product)->with('product', $all_product)->with('meta_keyword', $meta_keyword)->with('meta_description', $meta_description)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
        //cách 2
        //return view('user.home')->with(compact('cate_product', 'all_product', 'meta_keyword', 'meta_description', 'meta_title', 'url_canonical'));
    }

    //view search keyword
    public function search(Request $request)
    {

        $keywords = $request->search_input;

        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();

        $search_product = DB::table('tbl_product')->where('product_ten', 'like', '%' . $keywords . '%')->orderby('product_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }

        return view('user.product.search')->with('category', $cate_product)->with('search_product', $search_product)->with('product', $all_product)->with(compact('count_cart_mini'));
    }
    //front-chi tiết sp bumbummen99
    public function chi_tiet_san_pham($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }

        $detail_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_product.product_id', $product_id)->get();

        //sản phẩm tt
        foreach ($detail_product as $key => $pro_detail) {
            $category_id = $pro_detail->category_id;
        }
        //đếm lượt xem
        $post_luotxem_sanpham = sanpham::where('product_id', $product_id)->first();
        $post_luotxem_sanpham->product_luotxem = $post_luotxem_sanpham->product_luotxem + 1;
        $post_luotxem_sanpham->save();


        $sanpham_tuongtu = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_category_product.category_id', $category_id)
            ->where('tbl_product.product_trangthai', '1')
            ->whereNotIn('tbl_product.product_id', [$product_id])->get(); //whereNotIn : lấy ra tất cả sp trừ sp đã hiển thị

        return view('user.product.show_detail')->with('category', $cate_product)->with('detail_product', $detail_product)->with('sanpham_tuongtu', $sanpham_tuongtu)->with('product', $all_product)->with('post_luotxem_sanpham', $post_luotxem_sanpham)->with(compact('count_cart_mini'));
    }
    //view loại sp--fontend--home -- loại sản phẩm
    public function show_category_home($category_id, Request $request)
    {
        //$cate_product : lấy ds loại sp, $category_by_id: lấy danh sách sp theo lsp, $all_product: lấy danh sách sp
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();
        //$category_by_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')->where('tbl_product.category_id', $category_id)->limit(8)->get();

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();

        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }

        //lọc giá sản phẩm
        $category_by_cate = loaisapham::where('category_id', $category_id)->get();
        foreach ($category_by_cate as $key => $cate_lsp) {
            $category_id_sp = $cate_lsp->category_id;
        }

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];

            if ($sort_by == "giam_dan") {
                $category_by_id = sanpham::with('category')->where('category_id', $category_id_sp)->orderby('product_giaban', 'DESC')->get();
            } elseif ($sort_by == "tang_dan") {
                $category_by_id = sanpham::with('category')->where('category_id', $category_id_sp)->orderby('product_giaban', 'ASC')->get();
            } elseif ($sort_by == "ky_az") {
                $category_by_id = sanpham::with('category')->where('category_id', $category_id_sp)->orderby('product_ten', 'ASC')->get();
            } elseif ($sort_by == "ky_za") {
                $category_by_id = sanpham::with('category')->where('category_id', $category_id_sp)->orderby('product_ten', 'DESC')->get();
            }
        } else {
            $category_by_id = sanpham::with('category')->where('category_id', $category_id_sp)->orderby('product_id', 'DESC')->get();
        }

        return view('user.category.show_category')->with('category', $cate_product)->with('category_by_id', $category_by_id)->with('hienthi_name_category', $category_name)->with('pro_hienthi_all', $all_product)->with('product', $all_product)->with(compact('count_cart_mini'));
        //->with('product', $all_product); search
    }
    //mã giảm giá - coupon
    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $today_cartajax_mgg = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        //nếu khách hàng đẫ đăng nhập
        if (session()->get('khachhang_id')) {
            $magiamgia = magiamgia::where('magiamgia_code', $data['coupon_code'])
                ->where('magiamgia_trangthai', 1)
                ->where('magiamgia_ngayketthuc', '>=', $today_cartajax_mgg)
                ->where('magiamgia_user_id', 'LIKE', '%' . session()->get('khachhang_id') . '%')
                ->first(); //so sánh ngày kết thúc với ngày hiện tại, so sánh trạng thái, so sánh id của tbl_magiamgia vs id của khachhang dựa trên tính tương tự gần đúng mã và so sánh mã code

            //nếu đăng nhập và đã nhập mã giảm giá sử dụng rồi
            if ($magiamgia) {
                return redirect()->back()->with('error', 'Mã giảm giá này bạn đã sử dụng. Vui lòng nhập mã khác');
            } else { //nếu đăng nhập và nhập mã giảm giá chưa sử dụng hoặc mã giảm giá đã hết hạn
                $magiamgia_login_kh = magiamgia::where('magiamgia_code', $data['coupon_code'])
                    ->where('magiamgia_trangthai', 1)
                    ->where('magiamgia_ngayketthuc', '>=', $today_cartajax_mgg)
                    ->first(); //so sánh ngày kết thúc với ngày hiện tại, so sánh trạng thái mã và so sánh mã code
                if ($magiamgia_login_kh) {
                    $magiamgia_count = $magiamgia_login_kh->count();
                    if (
                        $magiamgia_count > 0
                    ) {
                        $magiamgia_session = Session::get('coupon_code');
                        if ($magiamgia_session == true) {
                            $is_avaiable = 0;
                            if ($is_avaiable == 0) {
                                $mgg[] = array(
                                    'magiamgia_code' => $magiamgia_login_kh->magiamgia_code, //bên trái tên đặt, bên phải tên trong db
                                    'magiamgia_loaigiamgia' => $magiamgia_login_kh->magiamgia_loaigiamgia,
                                    'magiamgia_sotiengiam' => $magiamgia_login_kh->magiamgia_sotiengiam,
                                );
                                Session::put('coupon_code', $mgg);
                            }
                        } else {
                            $mgg[] = array(
                                'magiamgia_code' => $magiamgia_login_kh->magiamgia_code,
                                'magiamgia_loaigiamgia' => $magiamgia_login_kh->magiamgia_loaigiamgia,
                                'magiamgia_sotiengiam' => $magiamgia_login_kh->magiamgia_sotiengiam,
                            );
                            Session::put('coupon_code', $mgg);
                        }
                        Session::save();
                        return redirect()->back()->with('message', 'Thêm mã giảm giá thành công.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Mã giảm giá không đúng hoặc đã hết hạn.');
                }
            }
        } else { //nếu khách hàng chưa đăng nhập
            $magiamgia = magiamgia::where('magiamgia_code', $data['coupon_code'])
                ->where('magiamgia_trangthai', 1)
                ->where('magiamgia_ngayketthuc', '>=', $today_cartajax_mgg)
                // ->where('magiamgia_user_id','LIKE','%'.session()->get('khachhang_id').'%')
                ->first(); //so sánh ngày kết thúc với ngày hiện tại, so sánh trạng thái mã và so sánh mã code
            if ($magiamgia) {
                $magiamgia_count = $magiamgia->count();
                if (
                    $magiamgia_count > 0
                ) {
                    $magiamgia_session = Session::get('coupon_code');
                    if ($magiamgia_session == true) {
                        $is_avaiable = 0;
                        if ($is_avaiable == 0) {
                            $mgg[] = array(
                                'magiamgia_code' => $magiamgia->magiamgia_code, //bên trái tên đặt, bên phải tên trong db
                                'magiamgia_loaigiamgia' => $magiamgia->magiamgia_loaigiamgia,
                                'magiamgia_sotiengiam' => $magiamgia->magiamgia_sotiengiam,
                            );
                            Session::put('coupon_code', $mgg);
                        }
                    } else {
                        $mgg[] = array(
                            'magiamgia_code' => $magiamgia->magiamgia_code,
                            'magiamgia_loaigiamgia' => $magiamgia->magiamgia_loaigiamgia,
                            'magiamgia_sotiengiam' => $magiamgia->magiamgia_sotiengiam,
                        );
                        Session::put('coupon_code', $mgg);
                    }
                    Session::save();
                    return redirect()->back()->with('message', 'Thêm mã giảm giá thành công.');
                }
            } else {
                return redirect()->back()->with('error', 'Mã giảm giá không đúng hoặc đã hết hạn.');
            }
        }

        //Session::forget('coupon_code'); //huỷ session tên coupon_code
    }

    //test send mail
    public function send()
    {
        $name = "MINOSS";
        Mail::send('user.email.test_mail', compact('name'), function ($email) use ($name) {
            $email->subject('Demo test mail');
            $email->to('doquantt4@gmail.com', $name);
        });
    }
    //view--liên hệ - contact
    public function lienhe()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }
        //cách 1
        return view('user.lienhe.lienhe')->with('category', $cate_product)->with('product', $all_product)->with(compact('count_cart_mini'));
    }

    //ajax
    //chi tiết sản phẩm ajax
    public function chi_tiet_san_pham_ajax($product_id, Request $request)
    {
        //$data = $request->all();
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();
        $size_product = DB::table('tbl_size')->orderby('size_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }

        $detail_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_product.product_id', $product_id)->get();

        //sản phẩm tt
        foreach ($detail_product as $key => $pro_detail) {
            $category_id = $pro_detail->category_id;
        }

        //đếm lượt xem
        // $post_luotxem_sanpham = sanpham::where('product_id', $product_id)->first();
        // $post_luotxem_sanpham->product_luotxem = $post_luotxem_sanpham->product_luotxem + 1;
        // $post_luotxem_sanpham->save();


        //lấy size và số lượng theo size
        //@foreach($kichco as $key => $size)
        //<option value="{{$size->productsize->size_ten}">{{$size->productsize->size_ten}}</option>
        //@endforeach
        //chưa lấy đc số lượng theo size sp
        $kichco = productsize::where('product_id', $product_id)->orderby('size_id', 'ASC')->get();
        //$productsize_id = productsize::where('productsize_id', $data['productsize_id'])->first();



        $sanpham_tuongtu = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_category_product.category_id', $category_id)
            ->where('tbl_product.product_trangthai', '1')
            ->whereNotIn('tbl_product.product_id', [$product_id])->get(); //whereNotIn : lấy ra tất cả sp trừ sp đã hiển thị

        return view('user.product.show_detail_ajax')->with('category', $cate_product)->with('product', $all_product)->with(compact('detail_product', 'sanpham_tuongtu', 'size_product', 'count_cart_mini', 'kichco'));
    }

    //chọn size hiện số lượng -- chi tiết sp
    public function select_chitietsp_prosize(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "chooseprosize_quantity") {
                $select_productsize = productsize::where('size_id', $data['size_id'])->where('product_id', $data['product_id'])->orderby('productsize_id', 'ASC')->get();
                foreach ($select_productsize as $key => $prosize) {

                    $output .= '<li>Số lượng sản phẩm còn: <span style="color:red;">' . $prosize->quantity . '</span></li>';
                    $output .= '<input value="' . $prosize->quantity . '" type="hidden" class="productsize-qty-hidden" name="productsize-qty-hidden">';
                    $output .= '<input value="' . $prosize->productsize->size_ten . '" type="hidden" class="productsize-ten-hidden" name="productsize-ten-hidden">';
                    $output .= '<input value="' . $prosize->productsize_id . '" type="hidden" class="productsize-id-hidden" name="productsize-id-hidden">';
                }
            } else {

                $select_productsizee = productsize::where('size_id', $data['size_id'])->orderby('productsize_id', 'ASC')->get();
                foreach ($select_productsizee as $key => $prosizee) {

                    $output .= '<span>Số lượng sản phẩm còn: ' . $prosizee->quantity . '</span>';
                }
            }
            echo $output;
        }
    }

    //view lịch sử mua hàng
    public function lich_su_mua_hang() //chưa xong
    {
        if (!session()->get('khachhang_id')) {
            return redirect('/login-checkout')->with('error', 'Vui lòng đăng nhập để xem lịch sử mua hàng');
        } else {
            $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get(); //menu
            $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
            if (session()->get('cart')) {
                $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
            } else {
                $count_cart_mini = 0; //đém số luọng gh nhỏ
            }

            $donhang = donhang::where('khachhang_id', session()->get('khachhang_id'))->orderby('don_hang_id', 'DESC')->get();

            //lấy tt tên kh
            $kh_donhang = khachhang::where('khachhang_id', session()->get('khachhang_id'))->first();
            $tenkh_donhang = $kh_donhang->khachhang_ten;
            return view('user.lichsu.lichsu_muahang')->with('category', $cate_product)->with('product', $all_product)->with(compact('donhang', 'tenkh_donhang', 'count_cart_mini'));
        }
    }
    //view chi tiết lịch sử đơn hàng
    public function view_history_ctdh($don_hang_code)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get(); //menu
        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }
        if (!session()->get('khachhang_id')) {
            return redirect('/login-checkout')->with('error', 'Vui lòng đăng nhập để xem lịch sử mua hàng');
        } else {
            //lấy tt tên kh
            $kh_donhang = khachhang::where('khachhang_id', session()->get('khachhang_id'))->first();
            $tenkh_donhang = $kh_donhang->khachhang_ten;

            //tt chi tiết đơn hàng
            $chitiet_donhang = chitietdonhang::with('product')->where('don_hang_code', $don_hang_code)->get();
            $donhang = donhang::where('don_hang_code', $don_hang_code)->first();
            // foreach ($donhang as $key => $d_hang) {
            $khachhang_id = $donhang->khachhang_id;
            $shipping_id = $donhang->shipping_id;
            $don_hang_trangthai = $donhang->don_hang_trangthai;
            $ngaytao_dh = $donhang->created_at;
            $donhang_code = $donhang->don_hang_code;
            // }
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
            //->with(compact('chitiet_donhang', 'donhang', 'khachhang', 'shipping', 'magiamgia_loaigiamgia', 'magiamgia_sotiengiam', 'don_hang_trangthai', 'donhang_code', 'ngaytao_dh'));
            return view('user.lichsu.chitiet_history_muahang')->with('category', $cate_product)->with('product', $all_product)
                ->with(compact('tenkh_donhang', 'chitiet_donhang', 'donhang', 'khachhang', 'shipping', 'magiamgia_loaigiamgia', 'magiamgia_sotiengiam', 'don_hang_trangthai', 'donhang_code', 'ngaytao_dh', 'count_cart_mini'));
        }
    }

    //lý do huỷ đơn hàng -- post
    public function ly_do_huy_don_hang(Request $request)
    {
        $data = $request->all();
        $donhang_h = donhang::where('don_hang_code', $data['don_hang_code'])->first();
        $donhang_h->donhang_lydohuy = $data['lydohuy'];
        $donhang_h->don_hang_trangthai = $data['don_hang_trangthai'];
        $donhang_h->save();
    }

    //view chi tiết tin tức
    public function chi_tiet_tin_tuc($tintuc_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();
        $size_product = DB::table('tbl_size')->orderby('size_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search
        if (session()->get('cart')) {
            $count_cart_mini = count(session()->get('cart')); //đém số luọng gh nhỏ
        } else {
            $count_cart_mini = 0; //đém số luọng gh nhỏ
        }

        $detail_tintuc = DB::table('tbl_tintuc')->where('tbl_tintuc.tintuc_id', $tintuc_id)->get();


        //đếm lượt xem
        // $post_luotxem_tintuc = tintuc::where('tintuc_id', $tintuc_id)->first();
        // $post_luotxem_tintuc->tintuc_luotxem = $post_luotxem_tintuc->tintuc_luotxem + 1;
        // $post_luotxem_tintuc->save();


        return view('user.tintuc.show_chitiet_tt')->with('category', $cate_product)->with('detail_tintuc', $detail_tintuc)->with('product', $all_product)->with(compact('count_cart_mini'));
    }

    //tăng lượt xem sản phẩm
    public function post_luot_xem_sp(Request $request)
    {
        $data = $request->all();
        $luottxemsp_h = sanpham::where('product_id', $data['product_id'])->first();
        $luottxemsp_h->product_luotxem = $data['product_luotxem'] + 1;

        $luottxemsp_h->save();
    }
    //tăng lượt xem tin tức
    public function post_luot_xem_tintuc(Request $request)
    {
        $data = $request->all();
        $add_luottxemsp_tintuc = tintuc::where('tintuc_id', $data['tintuc_id'])->first();
        $add_luottxemsp_tintuc->tintuc_luotxem = $data['tintuc_luotxem'] + 1;

        $add_luottxemsp_tintuc->save();
    }

    //select số lượng theo size chi tiết sp
    public function select_product_chitetsp(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "chooseprosize_quantity") {
                $select_procducts_size = productsize::where('size_id', $data['size_id'])->orderby('size_id', 'ASC')->get();

                foreach ($select_procducts_size as $key => $select_pro_size) {
                    $output .= '<span id="productsize_qty" name="productsize_qty" class="productsize_qty">' . $select_pro_size->quantity . '</span>';
                }
            } else {
                $output .= '<span id="productsize_qty" name="productsize_qty" class="productsize_qty">Số lượng còn: 0</span>';
            }
            echo $output;
        }
    }
}
