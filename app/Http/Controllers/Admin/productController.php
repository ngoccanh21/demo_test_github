<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Models\sanpham;
use App\Models\size;
use App\Models\productsize;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;

session_start();

class productController extends Controller
{
    //first = limit(1);save-product=post;update_product=post;
    //$data['product_ten'] = $request->product_ten : bên trái là tên trong csdl, bên phải tên trong view
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
    public function all_product()
    {
        $this->AuthLogin();
        //c1:gọi model
        $all_product = sanpham::join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->orderby('tbl_product.product_id', 'desc')->get();
        $manager_product  = view('admin.product.all_product')->with('all_product', $all_product);
        return view('layout_admin')->with('admin.product.all_product', $manager_product);

        ////c2:gọi trực tiếp bảng
        // $all_product = DB::table('tbl_product')
        //     ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        //     ->orderby('tbl_product.product_id', 'desc')->get();
        // $manager_product  = view('admin.product.all_product')->with('all_product', $all_product);
        // return view('layout_admin')->with('admin.product.all_product', $manager_product);
    }

    public function add_product(Request $request)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        // $size_product = DB::table('tbl_size')->orderby('size_id', 'desc')->get();

        return view('admin.product.add_product')->with('cate_product', $cate_product); //->with('size_product', $size_product);
    }

    public function save_product(Request $request) //post
    {
        $this->AuthLogin();
        $request->validate([
            'product_ten' => 'required',
            'product_mota' => 'required',
            'product_giaban' => 'required',
            // 'product_soluong' => 'required',
            'product_anh' => 'required'
        ], [
            'product_ten.required' => 'Tên sản phẩm không được để trống. Hãy nhập lại...',
            'product_mota.required' => 'Mô tả sản phẩm không được để trống. Hãy nhập lại...',
            'product_giaban.required' => 'Giá sản phẩm không được để trống. Hãy nhập lại...',
            // 'product_soluong.required' => 'Số lượng sản phẩm không được để trống. Hãy nhập lại...',
            'product_anh.required' => 'Hình ảnh sản phẩm không tồn tại. Hãy chọn ảnh...'
        ]);
        $data = array();

        $product_giaban = filter_var($request->product_giaban, FILTER_SANITIZE_NUMBER_INT); //lây các số

        $data['product_ten'] = $request->product_ten;
        $data['category_id'] = $request->product_cate;
        $data['product_mota'] = $request->product_mota;
        $data['product_giaban'] = $product_giaban;
        // $data['product_soluong'] = $request->product_soluong;
        $data['product_trangthai'] = $request->product_trangthai;

        // $arrayToString_size = implode(',', $request->input('product_size'));
        // $data['product_size'] = $arrayToString_size;
        // <div class="">
        //  @foreach($size_product as $key => $size_sp)
        //  <input type="checkbox" id="text-input" name="product_size[]" value="{{$size_sp->size_ten}}" class="">
        //  {$size_sp->size_ten}}
        //  @endforeach
        //  </div>

        // foreach ($request->product_size as $key => $ten_size) {
        //     $data['product_size'] = $request->product_size[$key];
        // }

        $get_image = $request->file('product_anh');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //getClientOriginalExtension() : lấy đuôi mở rộng của ảnh
            $name_image = current(explode('.', $get_name_image)); //phân tách tên ảnh trc dấu chấm
            $new_image =  $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/product', $new_image); //chuyển ảnh vào đường dẫn /upload/product
            $data['product_anh'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('/all-product');
        }
        $data['product_anh'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/all-product');
    }

    //ẩn trạng thái sản phẩm
    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_trangthai' => 0]);
        Session::put('message', 'Ẩn trạng thái sản phẩm thành công...');
        return Redirect::to('/all-product');
    }
    //hiện trạng thái sản phẩm
    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_trangthai' => 1]);
        Session::put('message', 'Hiện trạng thái sản phẩm thành công...');
        return Redirect::to('/all-product');
    }
    //update product
    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        //$size_product = DB::table('tbl_size')->orderby('size_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();

        $manager_product  = view('admin.product.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product); //->with('size_product', $size_product);
        return view('layout_admin')->with('admin.product.edit_product', $manager_product);
    }
    //post update product
    public function update_product(Request $request, $product_id) //post
    {
        $this->AuthLogin();
        $request->validate([
            'product_ten' => 'required',
            'product_mota' => 'required',
            'product_giaban' => 'required'
            // 'product_soluong' => 'required'
        ], [
            'product_ten.required' => 'Tên sản phẩm không được để trống. Hãy nhập lại...',
            'product_mota.required' => 'Mô tả sản phẩm không được để trống. Hãy nhập lại...',
            'product_giaban.required' => 'Giá sản phẩm không được để trống. Hãy nhập lại...'
            // 'product_soluong.required' => 'Giá sản phẩm không được để trống. Hãy nhập lại...'
        ]);
        $data = array();

        $product_giaban = filter_var($request->product_giaban, FILTER_SANITIZE_NUMBER_INT); //lây các số

        $data['product_ten'] = $request->product_ten;
        $data['product_mota'] = $request->product_mota;
        $data['product_giaban'] = $product_giaban;
        // $data['product_soluong'] = $request->product_soluong;
        $data['category_id'] = $request->product_cate;

        //$arrayToString_size = implode(',', $request->input('product_size'));
        //$data['product_size'] = $arrayToString_size;

        //$data['product_trangthai'] = $request->product_trangthai;
        $get_image = $request->file('product_anh');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('upload/product', $new_image);
            $data['product_anh'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Sửa thông tin sản phẩm thành công...');
            return Redirect::to('/all-product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Sửa thông tin sản phẩm thành công...');
        return Redirect::to('/all-product');
    }
    //delete product
    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa thông tin sản phẩm thành công...');
        return Redirect::to('/all-product');
    }
    //export file excel
    public function export_csv_product()
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }


    //số luọng theo size sản phẩm
    //view thêm size , số lượng
    public function view_product_size(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = $request->all();

        $sanpham = sanpham::where('product_id', $product_id)->first();
        $size = size::where('size_trangthai', '1')->orderby('size_id', 'desc')->get();

        //hiển thị bảng size và số lượng
        $size_pros = productsize::where('product_id', $product_id)->orderby('size_id', 'ASC')->get();

        //$size_id = size::orderby('size_id', 'desc')->first();



        return view('admin.product.add_product_size')->with(compact('size', 'sanpham', 'size_pros'));
    }
    //view update product size
    public function edit_product_size(Request $request, $productsize_id)
    {
        $this->AuthLogin();
        $edit_product_size = productsize::where('productsize_id', $productsize_id)->get();

        //$manager_product  = view('admin.product.edit_product')->with(compact('edit_product_size')); //->with('size_product', $size_product);
        return view('admin.product.edit_product_size')->with(compact('edit_product_size'));
    }
    //post update prodcut size
    public function update_produc_size(Request $request, $productsize_id)
    {
        $this->AuthLogin();
        $request->validate([
            'quantity' => 'required',
        ], [
            'quantity.required' => 'Số lượng sản phẩm được để trống. Hãy nhập lại...'
        ]);
        $data = array();
        $data['quantity'] = $request->quantity;
        if ($data['quantity'] <= 0) {
            return redirect()->back()->with('error', 'Thất bại! Số lượng sản phẩm của size không được nhỏ hơn 0...');
        } else {
            DB::table('tbl_product_size')->where('productsize_id', $productsize_id)->update($data);
            //Session::put('message', 'Cập nhật số lượng của size sản phẩm thành công...');
            return redirect('/all-product')->with('message', 'Cập nhật số lượng của size sản phẩm thành công...');
        }
    }

    //insert số lượng theo size
    public function post_product_size(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();

        //$data = array();
        $view_all_product_size = productsize::where('product_id', $data['product_id'])->where(
            'size_id',
            $data['size_id']
        )->first();

        if (
            $view_all_product_size && $data['quantity'] > 0
        ) {

            $view_all_product_size->quantity = $data['quantity'] + $view_all_product_size->quantity;
            $view_all_product_size->save();
        } else {
            //
            if ($data['size_id'] == '' && $data['quantity'] <= 0) {
                // Session::put('message', 'Thêm số lượng sản phẩm theo size thất bại do chưa chọn size và số lượng thêm không được nhỏ hơn 0!!!');
                return redirect()->back()->with('message', 'Thêm số lượng sản phẩm theo size thất bại do chưa chọn size và số lượng thêm không được nhỏ hơn 0!!!');
            } elseif ($data['size_id'] == '' && $data['quantity'] > 0) {
                return redirect()->back()->with('message', 'Thêm số lượng sản phẩm theo size thất bại do chưa chọn size!!!');
            } elseif ($data['size_id'] != '' && $data['quantity'] <= 0) {
                return redirect()->back()->with('message', 'Thêm số lượng sản phẩm theo size thất bại do số lượng thêm không được nhỏ hơn 0!!!');
            } elseif ($data['size_id'] != '' && $data['quantity'] > 0) {
                $productsize = new productsize();
                $productsize->product_id = $data['product_id'];
                $productsize->size_id = $data['size_id'];
                $productsize->quantity = $data['quantity'];

                $productsize->save();
                //return redirect()->back()->with('message', 'Thêm số lượng sản phẩm theo size thất bại do số lượng thêm không được nhỏ hơn 0!!!');
            } elseif ($data['size_id'] == '' && $data['quantity'] == "") {
                return redirect()->back()->with('message', 'Thêm số lượng sản phẩm theo size thất bại do số lượng bạn chưa nhập và chưa chọn size!!!');
            } elseif ($data['size_id'] != '' && $data['quantity'] == "") {
                return redirect()->back()->with('message', 'Thêm số lượng sản phẩm theo size thất bại do số lượng bạn chưa nhập!!!');
            } else {
                return redirect()->back()->with('message', 'Thêm số lượng sản phẩm theo thất bại!');
            }
        }
    }
    //delete product size
    public function delete_product_size($productsize_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product_size')->where('productsize_id', $productsize_id)->delete();
        //Session::put('message', 'Xóa thông tin sản phẩm thành công...');
        return redirect()->back()->with('message', 'Xoá số lượng của size sản phẩm thành công...');
    }



    // //front-chi tiết sp
    // public function chi_tiet_san_pham($product_id)
    // {
    //     $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();

    //     $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get(); //search

    //     $detail_product = DB::table('tbl_product')
    //         ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
    //         ->where('tbl_product.product_id', $product_id)->get();

    //     //sản phẩm tt
    //     foreach ($detail_product as $key => $pro_detail) {
    //         $category_id = $pro_detail->category_id;
    //     }


    //     $sanpham_tuongtu = DB::table('tbl_product')
    //         ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
    //         ->where('tbl_category_product.category_id', $category_id)
    //         ->where('tbl_product.product_trangthai', '1')
    //         ->whereNotIn('tbl_product.product_id', [$product_id])->get(); //whereNotIn : lấy ra tất cả sp trừ sp đã hiển thị

    //     return view('user.product.show_detail')->with('category', $cate_product)->with('detail_product', $detail_product)->with('sanpham_tuongtu', $sanpham_tuongtu)->with('product', $all_product);
    // }
}
