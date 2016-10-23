<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bill;
use App\PhieuNhapHang;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\Snappy\Facades\SnappyImage as SnappyImage;
class PrintFormController extends BaseController
{
      public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('authNhanVien', ['only' => 'getLogout']);
    }
    public function printBill($data){
        // return PDF::loadView('printedForms.bill')->setWidth(400)->inline('github.pdf');
        $hd = Bill::where('ma_hd',$data)->orWhere('id',$data)->first();
        $cthd = $hd->billDetails;
        // $pdf= PDF::loadView('printedForms.bill',['hd'=>$hd,'cthd'=>$cthd])->setOption('page-width', 200);
        // return $pdf->download('HD-'.time().'.pdf');
        $img= SnappyImage::loadView('printedForms.bill',['hd'=>$hd,'cthd'=>$cthd])->setOption('width',305);
        return $img->download(time().'HD.png');
    }
    public function printPNH($id){
        $d= PhieuNhapHang::find($id);
        $pdf= PDF::loadView('PNH.print',['d'=>$d]);
        return $pdf->download(time().'PNH.pdf');
    }

}
