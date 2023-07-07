<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\xaphuong;
use App\Models\thanhpho;
use App\Models\quanhuyen;
use App\Models\phiship;
use Illuminate\Support\Facades\Auth;

session_start();

class vanChuyenController extends Controller
{
    //đăng nhập
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
    public function phi_van_chuyen(Request $request)
    {
        $this->AuthLogin();

        $thanhpho = thanhpho::orderby('matp', 'ASC')->get();

        return view('admin.phiship.add_phiship')->with(compact('thanhpho'));
    }
    public function insert_phiship(Request $request) //ok
    {


        $data = $request->all();
        $phiship_matp = $data['thanhpho'];
        $phiship_maqh = $data['quanhuyen'];
        $phiship_xaid = $data['xaphuong'];
        $phiship = phiship::where('phiship_matp', $phiship_matp)->where('phiship_maqh', $phiship_maqh)->where('phiship_xaid', $phiship_xaid)->first();

        // nếu phí vận chuyển đã thêm thì ko insert vào db
        if ($phiship) {
            $login_count = $phiship->count();
            if ($login_count > 0) {
                //ko hiện message do insert bằng ajax
                Session::put('message', 'Thêm phí vận chuyển thất bại! Phí vận chuyển này đã tồn tại!!!');
                //return redirect('/phi-van-chuyen');
            }
        } else {
            $phi_ship = new phiship();
            // $phiship_matp = $data['phiship_matp'];
            // $phiship_maqh = $data['phiship_maqh'];
            // $phiship_xaid = $data['phiship_xaid'];
            $phi_ship->phiship_matp = $data['thanhpho'];
            $phi_ship->phiship_maqh = $data['quanhuyen'];
            $phi_ship->phiship_xaid = $data['xaphuong'];
            $phi_ship->phiship_phiship = $data['phi_ship'];
            $phi_ship->save();
        }
    }
    public function update_phiship(Request $request) //ok
    {
        $data = $request->all();
        $phiship = phiship::find($data['phiship_id']);
        $phiship_value = rtrim($data['phiship_value'], '.');
        $phiship->phiship_phiship = $phiship_value;
        $phiship->save();
    }
    public function select_vanchuyen(Request $request) //ok
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "thanhpho") {
                $select_quanhuyen = quanhuyen::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn quận/huyện---</option>';
                foreach ($select_quanhuyen as $key => $quanhuyen) {
                    $output .= '<option value="' . $quanhuyen->maqh . '">' . $quanhuyen->name_qh . '</option>';
                }
            } else {

                $select_xaphuong = xaphuong::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn xã/phường---</option>';
                foreach ($select_xaphuong as $key => $xaphuong) {
                    $output .= '<option value="' . $xaphuong->xaid . '">' . $xaphuong->name_xaphuong . '</option>';
                }
            }
            echo $output;
        }
    }

    public function select_phiship() //ok
    {
        $phiship = phiship::orderby('phiship_id', 'DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thread> 
					<tr style="border: 1px solid #ba9a9a;">
						<th>Tên thành phố</th>
						<th>Tên quận huyện</th> 
						<th>Tên xã phường</th>
						<th>Phí ship</th>
					</tr>  
				</thread>
				<tbody>
				';

        foreach ($phiship as $key => $p_ship) {

            $output .= '
					<tr style="border: 1px solid #ba9a9a;">
						<td>' . $p_ship->thanhpho->name_tp . '</td>
						<td>' . $p_ship->quanhuyen->name_qh . '</td>
						<td>' . $p_ship->xaphuong->name_xaphuong . '</td>
						<td style="border: 1px solid #ba9a9a;" contenteditable data-phiship_id="' . $p_ship->phiship_id . '" class="phi_phiship_edit">' . number_format($p_ship->phiship_phiship, 0, ',', '.') . 'vnđ</td>
					</tr>
					';
        }

        $output .= '		
				</tbody>
				</table></div>
				';

        echo $output;
    }
    // public function all_phivanchuyen(){

    // }
}
