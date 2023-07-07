<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\magiamgia;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

session_start();

class maGiamGiaController extends Controller
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
    public function all_magiamgia()
    {
        $this->AuthLogin();
        $now_mgg = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $all_magiamgia = magiamgia::orderby('magiamgia_id', 'DESC')->get();
        return view('admin.magiamgia.all_magiamgia')->with(compact('all_magiamgia', 'now_mgg'));
    }

    public function add_magiamgia()
    {
        $this->AuthLogin();
        return view('admin.magiamgia.add_magiamgia');
    }

    public function save_magiamgia(Request $request) //post
    {
        $this->AuthLogin();
        $request->validate([
            'magiamgia_ten' => 'required',
            'magiamgia_code' => 'required|min:5',
            'magiamgia_soluong' => 'required',
            'magiamgia_sotiengiam' => 'required',
            'magiamgia_ngaybatdau' => 'required',
            'magiamgia_ngayketthuc' => 'required'
        ], [
            'magiamgia_ten.required' => 'Tên mã giảm giá không được để trống. Hãy nhập lại...',
            'magiamgia_code.required' => 'Code mã giảm giá không được để trống. Hãy nhập lại...',
            'magiamgia_soluong.required' => 'số lượng mã giảm giá không được để trống. Hãy nhập lại...',
            'magiamgia_sotiengiam.required' => 'Số tiền hay % mã giảm giá không được để trống. Hãy nhập lại...',
            'magiamgia_ngaybatdau.required' => 'Ngày bắt đầu mã giảm giá không được để trống. Hãy nhập lại...',
            'magiamgia_ngayketthuc.required' => 'Ngày kết thúc mã giảm giá không được để trống. Hãy nhập lại...'
        ]);
        $data = $request->all();
        //$data = array();
        $magiamgia = new magiamgia();
        $magiamgia->magiamgia_ten = $data['magiamgia_ten'];
        //$magiamgia->magiamgia_code = $data['magiamgia_code'];
        $magiamgia->magiamgia_code = strtoupper($data['magiamgia_code']);
        $magiamgia->magiamgia_soluong = $data['magiamgia_soluong'];
        $magiamgia->magiamgia_loaigiamgia = $data['magiamgia_loaigiamgia'];
        $magiamgia->magiamgia_sotiengiam = $data['magiamgia_sotiengiam'];
        $magiamgia->magiamgia_ngaybatdau = $data['magiamgia_ngaybatdau'];
        $magiamgia->magiamgia_ngayketthuc = $data['magiamgia_ngayketthuc'];
        $magiamgia->magiamgia_trangthai = $data['magiamgia_trangthai'];

        $mgg = magiamgia::where('magiamgia_code', $magiamgia->magiamgia_code)->first();
        if ($mgg) {
            $mgg_count = $mgg->count();
            if ($mgg_count > 0) {
                Session::put('message', 'Thêm mã giảm giá không thành công do mã giảm giá vừa thêm đã tồn tại');
                return redirect()->back();
            }
        } else {
            if ($data['magiamgia_loaigiamgia'] == 0) {
                //Session::put('message', 'Thêm mã giảm giá thất bại do bạn chưa chọn loại mã giảm giá');
                return redirect()->back()->with('message', 'Thêm mã giảm giá thất bại do bạn chưa chọn loại mã giảm giá');
            } else {
                if ($data['magiamgia_loaigiamgia'] == 1 && $data['magiamgia_sotiengiam'] >= 100 || $data['magiamgia_loaigiamgia'] == 1 && $data['magiamgia_sotiengiam'] < 1) {
                    Session::put('message', 'Thêm mã giảm giá không thành công do % giảm không được vượt quá 100% hoặc nhỏ hơn 0%');
                    return redirect()->back();
                } else {
                    if ($data['magiamgia_ngayketthuc'] <= $data['magiamgia_ngaybatdau']) {
                        Session::put('message', 'Thêm mã giảm giá không thành công do ngày bắt đầu không được nhỏ hơn ngày kết thúc');
                        return redirect()->back();
                    } else {
                        $magiamgia->save();
                        Session::put('message', 'Thêm mã giảm giá thành công');
                    }
                }

                // $magiamgia->save();
                // Session::put('message', 'Thêm mã giảm giá thành công');
            }
        }
        // $magiamgia->save();
        // Session::put('message', 'Thêm mã giảm giá thành công');
        return Redirect::to('/all-magiamgia');
    }
    public function active_magiamgia($magiamgia_id)
    {
        $this->AuthLogin();
        DB::table('tbl_magiamgia')->where('magiamgia_id', $magiamgia_id)->update(['magiamgia_trangthai' => 0]);
        Session::put('message', 'Ẩn trạng thái mã giảm giá thành công...');
        return Redirect::to('/all-magiamgia');
    }
    public function unactive_magiamgia($magiamgia_id)
    {
        $this->AuthLogin();
        DB::table('tbl_magiamgia')->where('magiamgia_id', $magiamgia_id)->update(['magiamgia_trangthai' => 1]);
        Session::put('message', 'Hiện trạng thái mã giảm giá thành công...');
        return Redirect::to('/all-magiamgia');
    }
    public function delete_magiamgia($magiamgia_id)
    {
        $this->AuthLogin();
        magiamgia::findOrFail($magiamgia_id)->delete();
        session()->put('message', 'Xoá mã giá phẩm thành công');
        return Redirect::to('/all-magiamgia');
    }
}