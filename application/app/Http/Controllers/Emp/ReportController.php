<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BasicController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\hanghoa;
use App\PhieuNhapHang;
use App\ChiTietPhieuNhapHang;
use App\Bill;
use App\BillDetail;
use Carbon\Carbon;
class ReportController extends BasicController
{
      public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('authNhanVien', ['only' => 'getLogout']);
    }
    public function doanhthu(){
        /*
        doanh thu = so tien ban duoc(HD);
         */
        return view('reports.index');
    }
    public function doanhthuPostAjax(Request $request){
        /*
        doanh thu = so tien ban duoc(HD);
         */
        if($request->ajax()){
            if($request->doanhthu=='hom_nay'){
                $ngay = 'Hôm nay';
                $ban_hang = Bill::whereDay('created_at', '=', date('d'))->sum('thanh_tien');
                $thu_them = '0';
                $chi_phi = PhieuNhapHang::whereDay('created_at', '=', date('d'))->sum('thanh_tien');
                $loi_nhuan= $ban_hang+$thu_them-$chi_phi;


                $table = array();
                $table['cols'] = array(
                    array('id' => '', 'label' => 'Ngày', 'type' => 'string'),
                    array('id' => '', 'label' => 'Bán hàng', 'type' => 'number'),
                    array('id' => '', 'label' => 'Thu thêm', 'type' => 'number'),
                    array('id' => '', 'label' => 'Chi phí', 'type' => 'number'),
                    array('id' => '', 'label' => 'Lợi nhuận', 'type' => 'number')
                    );

                $rows = array();

                 $temp = array();
            //Values
                $temp[] = array('v' => (string)$ngay);
                 $temp[] = array('v' => (int)$ban_hang);
                $temp[] = array('v' => (int)$thu_them);
                $temp[] = array('v' => (int)$chi_phi);
                $temp[] = array('v' => (int)$loi_nhuan);
                $rows[] = array('c' => $temp);
                $table['rows'] = $rows;
                $jsonTable = json_encode($table,JSON_UNESCAPED_UNICODE);
               echo $jsonTable;
        // return view('reports.doanhthu',['data'=>$jsonTable]);
            }else if($request->doanhthu=='hom_qua'){
                $ngay = 'Hôm qua';
                $ban_hang = Bill::whereDay('created_at', '=', Carbon::yesterday()->toDateString())->sum('thanh_tien');
                $thu_them = '0';
                $chi_phi = PhieuNhapHang::whereDay('created_at', '=', Carbon::yesterday()->toDateString())->sum('thanh_tien');
                $loi_nhuan= $ban_hang+$thu_them-$chi_phi;


                $table = array();
                $table['cols'] = array(
                    array('id' => '', 'label' => 'Ngày', 'type' => 'string'),
                    array('id' => '', 'label' => 'Bán hàng', 'type' => 'number'),
                    array('id' => '', 'label' => 'Thu thêm', 'type' => 'number'),
                    array('id' => '', 'label' => 'Chi phí', 'type' => 'number'),
                    array('id' => '', 'label' => 'Lợi nhuận', 'type' => 'number')
                    );

                $rows = array();

                 $temp = array();
            //Values
                $temp[] = array('v' => (string)$ngay);
                 $temp[] = array('v' => (int)$ban_hang);
                $temp[] = array('v' => (int)$thu_them);
                $temp[] = array('v' => (int)$chi_phi);
                $temp[] = array('v' => (int)$loi_nhuan);
                $rows[] = array('c' => $temp);
                $table['rows'] = $rows;
                $jsonTable = json_encode($table,JSON_UNESCAPED_UNICODE);
               echo $jsonTable;
            }else if($request->doanhthu=='thang_nay'){
                $ngay = 'Tháng này';
                $ban_hang = Bill::whereMonth('created_at', '=', date('m'))->sum('thanh_tien');
                $thu_them = '0';
                $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', date('m'))->sum('thanh_tien');
                $loi_nhuan= $ban_hang+$thu_them-$chi_phi;


                $table = array();
                $table['cols'] = array(
                    array('id' => '', 'label' => 'Ngày', 'type' => 'string'),
                    array('id' => '', 'label' => 'Bán hàng', 'type' => 'number'),
                    array('id' => '', 'label' => 'Thu thêm', 'type' => 'number'),
                    array('id' => '', 'label' => 'Chi phí', 'type' => 'number'),
                    array('id' => '', 'label' => 'Lợi nhuận', 'type' => 'number')
                    );

                $rows = array();

                 $temp = array();
            //Values
                $temp[] = array('v' => (string)$ngay);
                $temp[] = array('v' => (int)$ban_hang);
                $temp[] = array('v' => (int)$thu_them);
                $temp[] = array('v' => (int)$chi_phi);
                $temp[] = array('v' => (int)$loi_nhuan);
                $rows[] = array('c' => $temp);
                $table['rows'] = $rows;
                $jsonTable = json_encode($table,JSON_UNESCAPED_UNICODE);
               echo $jsonTable;
            }else if($request->doanhthu=='quy_nay'){
                $ngay ='';
                // xac dinh quy
                if(date('m')=='1'||date('m')=='2'||date('m')=='3'){
                    $ngay = 'Qúy I';
                }else if(date('m')=='4'||date('m')=='5'||date('m')=='6'){
                    $ngay = 'Qúy II';
                }else if(date('m')=='7'||date('m')=='8'||date('m')=='9'){
                    $ngay = 'Qúy III';
                }else {
                    $ngay = 'Qúy IV';
                }
                $ban_hang=0;
                $thu_them=0;
                $chi_phi=0;
                $loi_nhuan=0;
                /*xac dinh doanh thu ban hang trong quy*/
                if($ngay=='Qúy I'){
                    $ban_hang = Bill::whereMonth('created_at', '=', '1')->orWhere('created_at', '=', '2')->orWhere('created_at', '=', '3') ->sum('thanh_tien');
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', '1')->orWhere('created_at', '=', '2')->orWhere('created_at', '=', '3') ->sum('thanh_tien');
                    $thu_them=0;
                    $loi_nhuan= $ban_hang+$thu_them-$chi_phi;

                }else if($ngay=='Qúy II'){
                    $ban_hang = Bill::whereMonth('created_at', '=', '4')->orWhere('created_at', '=', '5')->orWhere('created_at', '=', '6') ->sum('thanh_tien');
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', '4')->orWhere('created_at', '=', '5')->orWhere('created_at', '=', '6') ->sum('thanh_tien');
                    $thu_them=0;
                    $loi_nhuan= $ban_hang+$thu_them-$chi_phi;
                }else if($ngay=='Qúy III'){
                    $ban_hang = Bill::whereMonth('created_at', '=', '7')->orWhere('created_at', '=', '8')->orWhere('created_at', '=', '9') ->sum('thanh_tien');
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', '7')->orWhere('created_at', '=', '8')->orWhere('created_at', '=', '9') ->sum('thanh_tien');
                    $thu_them=0;
                    $loi_nhuan= $ban_hang+$thu_them-$chi_phi;
                }else{
                    $ban_hang = Bill::whereMonth('created_at', '=', '10')->orWhere('created_at', '=', '11')->orWhere('created_at', '=', '12') ->sum('thanh_tien');
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', '10')->orWhere('created_at', '=', '11')->orWhere('created_at', '=', '12') ->sum('thanh_tien');
                    $thu_them=0;
                    $loi_nhuan= $ban_hang+$thu_them-$chi_phi;
                }

                 $table = array();
                $table['cols'] = array(
                    array('id' => '', 'label' => 'Ngày', 'type' => 'string'),
                    array('id' => '', 'label' => 'Bán hàng', 'type' => 'number'),
                    array('id' => '', 'label' => 'Thu thêm', 'type' => 'number'),
                    array('id' => '', 'label' => 'Chi phí', 'type' => 'number'),
                    array('id' => '', 'label' => 'Lợi nhuận', 'type' => 'number')
                    );

                $rows = array();

                 $temp = array();
            //Values
                $temp[] = array('v' => (string)$ngay);
                $temp[] = array('v' => (int)$ban_hang);
                $temp[] = array('v' => (int)$thu_them);
                $temp[] = array('v' => (int)$chi_phi);
                $temp[] = array('v' => (int)$loi_nhuan);
                $rows[] = array('c' => $temp);
                $table['rows'] = $rows;
                $jsonTable = json_encode($table,JSON_UNESCAPED_UNICODE);
               echo $jsonTable;

            }else if($request->doanhthu=='nam_nay'){
                $ngay = 'Năm này';
                $ban_hang = Bill::whereYear('created_at', '=', date('Y'))->sum('thanh_tien');
                $thu_them = '0';
                $chi_phi = PhieuNhapHang::whereYear('created_at', '=', date('Y'))->sum('thanh_tien');
                $loi_nhuan= $ban_hang+$thu_them-$chi_phi;


                $table = array();
                $table['cols'] = array(
                    array('id' => '', 'label' => 'Năm', 'type' => 'string'),
                    array('id' => '', 'label' => 'Bán hàng', 'type' => 'number'),
                    array('id' => '', 'label' => 'Thu thêm', 'type' => 'number'),
                    array('id' => '', 'label' => 'Chi phí', 'type' => 'number'),
                    array('id' => '', 'label' => 'Lợi nhuận', 'type' => 'number')
                    );

                $rows = array();

                 $temp = array();
            //Values
                $temp[] = array('v' => (string)$ngay);
                $temp[] = array('v' => (int)$ban_hang);
                $temp[] = array('v' => (int)$thu_them);
                $temp[] = array('v' => (int)$chi_phi);
                $temp[] = array('v' => (int)$loi_nhuan);
                $rows[] = array('c' => $temp);
                $table['rows'] = $rows;
                $jsonTable = json_encode($table,JSON_UNESCAPED_UNICODE);
               echo $jsonTable;

            }else if($request->doanhthu=='theo_thang'){
                $table = array();
                $table['cols'] = array(
                    array('id' => '', 'label' => 'Tháng', 'type' => 'string'),
                    array('id' => '', 'label' => 'Bán hàng', 'type' => 'number'),
                    array('id' => '', 'label' => 'Thu thêm', 'type' => 'number'),
                    array('id' => '', 'label' => 'Chi phí', 'type' => 'number'),
                    array('id' => '', 'label' => 'Lợi nhuận', 'type' => 'number')
                    );
                 $rows = array();

                for($i=1;$i<=12;$i++){
                    $temp = array();
                    $ngay='Tháng '.$i;
                    $ban_hang = Bill::whereMonth('created_at', '=', $i)->sum('thanh_tien');
                    $thu_them = '0';
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', $i)->sum('thanh_tien');
                    $loi_nhuan= $ban_hang+$thu_them-$chi_phi;
                    $temp[] = array('v' => (string)$ngay);
                    $temp[] = array('v' => (int)$ban_hang);
                    $temp[] = array('v' => (int)$thu_them);
                    $temp[] = array('v' => (int)$chi_phi);
                    $temp[] = array('v' => (int)$loi_nhuan);
                    $rows[] = array('c' => $temp);
                }
                $table['rows'] = $rows;
                $jsonTable = json_encode($table,JSON_UNESCAPED_UNICODE);
                echo $jsonTable;
            }else if($request->doanhthu=='theo_quy'){
                $table = array();
                $table['cols'] = array(
                    array('id' => '', 'label' => 'Quý', 'type' => 'string'),
                    array('id' => '', 'label' => 'Bán hàng', 'type' => 'number'),
                    array('id' => '', 'label' => 'Thu thêm', 'type' => 'number'),
                    array('id' => '', 'label' => 'Chi phí', 'type' => 'number'),
                    array('id' => '', 'label' => 'Lợi nhuận', 'type' => 'number')
                    );
                 $rows = array();

                for($i=1;$i<=4;$i++){
                    $temp = array();
                    $ngay='Quý '.$i;
                    if($i==1){
                    $ban_hang = Bill::whereMonth('created_at', '=', '1')->orWhere('created_at', '=', '2')->orWhere('created_at', '=', '3') ->sum('thanh_tien');
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', '1')->orWhere('created_at', '=', '2')->orWhere('created_at', '=', '3') ->sum('thanh_tien');


                }else if($i==2){
                    $ban_hang = Bill::whereMonth('created_at', '=', '4')->orWhere('created_at', '=', '5')->orWhere('created_at', '=', '6') ->sum('thanh_tien');
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', '4')->orWhere('created_at', '=', '5')->orWhere('created_at', '=', '6') ->sum('thanh_tien');

                }else if($i==3){
                    $ban_hang = Bill::whereMonth('created_at', '=', '7')->orWhere('created_at', '=', '8')->orWhere('created_at', '=', '9') ->sum('thanh_tien');
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', '7')->orWhere('created_at', '=', '8')->orWhere('created_at', '=', '9') ->sum('thanh_tien');

                }else{
                    $ban_hang = Bill::whereMonth('created_at', '=', '10')->orWhere('created_at', '=', '11')->orWhere('created_at', '=', '12') ->sum('thanh_tien');
                    $chi_phi = PhieuNhapHang::whereMonth('created_at', '=', '10')->orWhere('created_at', '=', '11')->orWhere('created_at', '=', '12') ->sum('thanh_tien');

                }
                    $thu_them = '0';
                    $loi_nhuan= $ban_hang+$thu_them-$chi_phi;
                    $temp[] = array('v' => (string)$ngay);
                    $temp[] = array('v' => (int)$ban_hang);
                    $temp[] = array('v' => (int)$thu_them);
                    $temp[] = array('v' => (int)$chi_phi);
                    $temp[] = array('v' => (int)$loi_nhuan);
                    $rows[] = array('c' => $temp);
                }
                $table['rows'] = $rows;
                $jsonTable = json_encode($table,JSON_UNESCAPED_UNICODE);
                echo $jsonTable;

            }else if($request->doanhthu=='theo_nam'){
                $min_year = date('Y',strtotime(PhieuNhapHang::min('created_at')));
                $max_year = date('Y',strtotime(Bill::max('created_at')));
                $table = array();
                $table['cols'] = array(
                    array('id' => '', 'label' => 'Năm', 'type' => 'string'),
                    array('id' => '', 'label' => 'Bán hàng', 'type' => 'number'),
                    array('id' => '', 'label' => 'Thu thêm', 'type' => 'number'),
                    array('id' => '', 'label' => 'Chi phí', 'type' => 'number'),
                    array('id' => '', 'label' => 'Lợi nhuận', 'type' => 'number')
                    );
                $rows = array();
                for($y =$min_year;$y<= $max_year;$y++){
                    $temp = array();
                    $ngay='Năm '.$y;
                    $ban_hang = Bill::whereYear('created_at', '=', $y)->sum('thanh_tien');
                    $thu_them = '0';
                    $chi_phi = PhieuNhapHang::whereYear('created_at', '=', $y)->sum('thanh_tien');
                    $loi_nhuan= $ban_hang+$thu_them-$chi_phi;
                    $temp[] = array('v' => (string)$ngay);
                    $temp[] = array('v' => (int)$ban_hang);
                    $temp[] = array('v' => (int)$thu_them);
                    $temp[] = array('v' => (int)$chi_phi);
                    $temp[] = array('v' => (int)$loi_nhuan);
                    $rows[] = array('c' => $temp);
                }
                $table['rows'] = $rows;
                $jsonTable = json_encode($table,JSON_UNESCAPED_UNICODE);
                echo $jsonTable;

            }else if($request->doanhthu=='tuy_chon'){

            }

        }

    }

    public function hangton(){
        $data= hanghoa::all();
        return view('reports.hangtonkho')->with('data',$data);
    }

    public function loi_nhuan(){
        /*
        doanh thu = so tien ban duoc(HD);
         */
    }
    public function loi_nhuan_homnay(){

    }
    public function loi_nhuan_homqua(){

    }
    public function loi_nhuan_thang(){

    }
    public function loi_nhuan_quy(){

    }
    public function loi_nhuan_nam(){

    }


}
