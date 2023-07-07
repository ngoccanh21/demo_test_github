<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\loaisapham;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use Illuminate\Support\Facades\Auth;

session_start();

class categoryProductController extends Controller
{
    //first = limit(1);save-category=post;update_category_product=post;
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
    public function all_category()
    {
        $this->AuthLogin();
        $all_category = DB::table('tbl_category_product')->get();
        $manager_category_product  = view('admin.category.all_category')->with('all_category', $all_category);
        return view('layout_admin')->with('admin.category.all_category', $manager_category_product);
        //return view('admin.category.all_category');
    }

    public function add_category()
    {
        $this->AuthLogin();
        return view('admin.category.add_category');
    }
    public function save_category_product(Request $request) //post
    {
        $this->AuthLogin();
        $request->validate([
            'category_ten' => 'required',
            'category_mota' => 'required'
        ], [
            'category_ten.required' => 'Tên loại sản phẩm không được để trống. Hãy nhập lại...',
            'category_mota.required' => 'Mô tả loại sản phẩm không được để trống. Hãy nhập lại...'
        ]);
        $data = array();
        $data['category_ten'] = $request->category_ten;
        $data['category_mota'] = $request->category_mota;
        $data['category_trangthai'] = $request->category_trangthai;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm loại sản phẩm thành công...');
        return Redirect::to('/all-category');
    }
    public function active_category_product($category_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_trangthai' => 0]);
        Session::put('message', 'Ẩn trạng thái loại sản phẩm thành công...');
        return Redirect::to('/all-category');
    }
    public function unactive_category_product($category_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->update(['category_trangthai' => 1]);
        Session::put('message', 'Hiện trạng thái loại sản phẩm thành công...');
        return Redirect::to('/all-category');
    }
    public function edit_category($category_id)
    {
        $this->AuthLogin();
        $edit_category = DB::table('tbl_category_product')->where('category_id', $category_id)->get();
        $manager_category_product  = view('admin.category.edit_category')->with('edit_category', $edit_category);
        return view('layout_admin')->with('admin.category.edit_category', $manager_category_product);
    }
    public function update_category_product(Request $request, $category_id) //post
    {
        $this->AuthLogin();
        $request->validate([
            'category_ten' => 'required',
            'category_mota' => 'required'
        ], [
            'category_ten.required' => 'Tên loại sản phẩm không được để trống. Hãy nhập lại...',
            'category_mota.required' => 'Mô tả loại sản phẩm không được để trống. Hãy nhập lại...'
        ]);
        $data = array();
        $data['category_ten'] = $request->category_ten;
        $data['category_mota'] = $request->category_mota;

        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Sửa thông tin loại sản phẩm thành công...');
        return Redirect::to('/all-category');
    }
    public function delete_category($category_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_id)->delete();
        Session::put('message', 'Xoá thông tin loại sản phẩm thành công...');
        return Redirect::to('/all-category');
    }
    //export file excel
    public function export_csv()
    {
        return Excel::download(new CategoryExport, 'category_product.xlsx');
    }

    // //fontend--home
    // public function show_category_home($category_id)
    // {
    //     //$cate_product : lấy ds loại sp, $category_by_id: lấy danh sách sp theo lsp, $all_product: lấy danh sách sp
    //     $cate_product = DB::table('tbl_category_product')->where('category_trangthai', '1')->orderby('category_id', 'desc')->get();
    //     $category_by_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')->where('tbl_product.category_id', $category_id)->limit(8)->get();

    //     $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();

    //     $all_product = DB::table('tbl_product')->where('product_trangthai', '1')->orderby('product_id', 'desc')->limit(8)->get();
    //     return view('user.category.show_category')->with('category', $cate_product)->with('category_by_id', $category_by_id)->with('hienthi_name_category', $category_name)->with('pro_hienthi_all', $all_product)->with('product', $all_product);
    //     //->with('product', $all_product); search
    // }
}
