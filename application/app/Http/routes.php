<?php

use App\hanghoa;
use App\NhanVien;
use App\NhomNguoiDung;
use App\KhachHang;
use App\DanhMuc;
use App\PhieuNhapHang;
use App\ChiTietPhieuNhapHang;
use App\Price;
use App\Quyen;
use App\NhomQuyen;
use App\QuyenNhanVien;
use App\Bill;
use App\Order;
use App\BillDetail;
use App\PhieuTraHangNhap;
use App\ChiTietPhieuKiemKe;
use  Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\Snappy\Facades\SnappyImage;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Carbon\Carbon;
Route::get('/test1', function() {
        // echo
        // echo Cart::content();
  return view('test1');


    });


// Route::get('/upload', 'ImageController@getUploadForm');


Route::post('/upload/image',[
            'as'=>'image.ReView',
            'uses'=>'ImageController@postUpload'
            ]);

// **********Route for admin
    Route::group(['namespace' => 'Emp','prefix'=>'emp'], function()
    {
        // Đăng nhập
        Route::get('/login',[
            'as'=>'emp.getLogIn',
            'uses'=>'LogInController@getLogin'
            ]);
        Route::post('/postLogin',[
            'as'=>'emp.postLogin',
            'uses'=>'LogInController@postLogin'
            ]);
        // end Đăng nhập


        // Route::group(, function () {

            // Dang xuat
            Route::get('/logout',[
                'as'=>'emp.getLogOut',
                'uses'=>'LogInController@getLogout'
                ]);
            // Dashboard
            Route::get('/', function(){
                return view('home.homeEmp');
                })->middleware(['authNhanVien']);
            /************************************************/
            // Quan ly nhan vien
            Route::resource('emloyees', 'EmloyeesController');
            // Quan ly danh muc
            Route::resource('cate', 'CategoriesController');


            //Quan ly ncc
            Route::resource('ncc', 'NCCController');
            // Quan ly hang hoa
            Route::resource('product', 'ProductsController');

            // Quan ly khach hang
            Route::resource('cus', 'CustomersController');

            //Quan ly phieu nhap hang
            Route::resource('pnh', 'PhieuNhapHangController');
            Route::resource('pkk', 'PhieuKiemKeController');
            Route::resource('pthn', 'PhieuTraHangNhapController');

            /*chinh sach gia cua hang hoa*/
            Route::resource('price', 'PricesController');
            Route::resource('bill', 'BillsController');
            /*********************************************/
            /*Route for export*/
                Route::get('/cus/export',[
                    'uses'=>'ExportController@getExportKhachHang',
                    'as'=>'cus.exp',
                    ]);
                Route::get('/pro/export',[
                    'uses'=>'ExportController@getExportHangHoa',
                    'as'=>'product.exp',
                    ]);
                Route::get('/emp/export',[
                    'uses'=>'ExportController@getExportNhanVien',
                    'as'=>'emloyees.exp',
                    ]);
            /*End route for export*/
            /******************************************/
            /*route for search */
                Route::post('/search/hh_dongia',[
                    'uses'=>'SearchController@search_pnh_hh',
                    'as'=>'pnh.search.hh',
                ]);
                Route::post('/hd/search/addhd',[
                    'uses'=>'SearchController@search_addhd',
                    'as'=>'hd.search.addhd',
                ]);
                Route::post('/emp/search',[
                    'uses'=>'SearchController@searchEmp',
                    'as'=>'emloyees.search',
                    ]);
                Route::post('/pro/search',[
                    'uses'=>'SearchController@searchPro',
                    'as'=>'product.search',
                    ]);
            /*End route for search */
            /*******************************************/
            /*route for printed*/
                route::get('/print/bill/{data}',[
                    'uses'=>'PrintFormController@printBill',
                    'as'=>'print.bill'
                    ]);
                route::get('/print/bills',[
                    'uses'=>'PrintFormController@github',
                    'as'=>'bills.print.bills'
                    ]);
                route::get('/print/{id}',[
                    'uses'=>'PrintFormController@printPNH',
                    'as'=>'print.pnh'
                    ]);

            /*End route for printed*/
            /***********************************/
            /*route for report*/
                Route::get('/rep/doanhthu',[
                    'uses'=>'ReportController@doanhthu',
                    'as'=>'rep.doanhthu',
                    ]);
                Route::post('/rep/doanhthuPostAjax',[
                    'uses'=>'ReportController@doanhthuPostAjax',
                    'as'=>'rep.doanhthu.ajax',
                    ]);
                Route::get('/rep/doanhthu_homqua',[
                    'uses'=>'ReportController@doanhthu_homqua',
                    'as'=>'rep.doanhthu_homqua',
                    ]);
                Route::get('/rep/doanhthu_thangnay',[
                    'uses'=>'ReportController@doanhthu_thangnay',
                    'as'=>'rep.doanhthu_thangnay',
                    ]);
                Route::get('/rep/doanhthu_theoquy',[
                    'uses'=>'ReportController@doanhthu_theoquy',
                    'as'=>'rep.doanhthu_theoquy',
                    ]);
                Route::get('/rep/doanhthu_theonam',[
                    'uses'=>'ReportController@doanhthu_theonam',
                    'as'=>'rep.doanhthu_theonam',
                    ]);
                /******hang ton******/
                Route::get('/rep/hangton',[
                    'uses'=>'ReportController@hangton',
                    'as'=>'rep.hangton',
                    ]);
            /*end route for report*/
            /*route for order*/

                Route::get('/order/index',[
                    'uses'=>'OrderController@index',
                    'as'=>'order.index',
                    ]);
                Route::get('/order/newIndex',[
                    'uses'=>'OrderController@newIndex',
                    'as'=>'order.newIndex',
                    ]);

                Route::get('/order/send/{id}',[
                    'uses'=>'OrderController@send',
                    'as'=>'order.send',
                    ]);

    });
// ***********end route for admin

// *********Route for gesst

// *********Route for khach hang
    Route::group(['namespace'=>'Cus'],function(){
        /*authendicate*/
        Route::get('/login',[
            'as'=>'cus.getLogIn',
            'uses'=>'LogInController@getLogIn'
            ]);
        Route::get('/logout',[
            'as'=>'cus.getLogOut',
            'uses'=>'LogInController@getLogOut'
            ]);
        Route::get('/registration',[
            'as'=>'cus.getRegis',
            'uses'=>'LogInController@getRegis'
            ]);
        Route::post('/PostRegistration',[
            'as'=>'cus.postRegis',
            'uses'=>'LogInController@postRegis'
            ]);
        Route::get('/registration_success',[
            'as'=>'cus.regis.success',
            'uses'=>'LogInController@getRegisSuccess'
            ]);

        Route::post('/postLogin',[
            'as'=>'cus.postLogIn',
            'uses'=>'LogInController@postLogIn'
            ]);
        Route::get('/',[
            'as'=>'home',
            'uses'=>'HomeController@index'
            ]);
        /*end authendicate*/

        /*Display product*/
        Route::get('/pro/{ma_dm}',[
            'as'=>'home.product',
            'uses'=>'HomeController@getProductFromDMCon'
            ]);
        Route::group(['middleware'=>'authKhachHang','prefix'=>'cus'],function(){
            Route::get('/',function(){
                Route::post('/logout',[
                'as'=>'cus.getLogOut',
                'uses'=>'LogInController@getLogOut'
                ]);
                Route::get('/', function(){
                return view('home.home')->with('success','Đăng nhập thành công');
                });
            });
        });
        /*Search hang hía*/
        Route::post('search/hh',[
            'as'=>'search.cus.hh',
            'uses'=>'SearchController@search_hh']);
        /*end search hang hoa*/

        Route::post('/cart/add-product',[
            'as'=>'cart.store',
            'uses'=>'CardController@store'
            ]);
        Route::post('/cart/change_soluong',[
            'as'=>'cart.change_soluong',
            'uses'=>'CardController@change_soluong'
            ]);
        Route::delete('/cart/empty',[
            'as'=>'cart.empty',
            'uses'=>'CardController@emptyCart'
            ]);
        Route::get('/cart/hover-cart',[
            'as'=>'cart.hover',
            'uses'=>'CardController@hover_Card'
            ]);
        Route::get('/cart/index',[
            'as'=>'cart.index',
            'uses'=>'CardController@index'
            ]);
        Route::delete('/cart/delete/{id}',[
            'as'=>'cart.delete',
            'uses'=>'CardController@destroy'
            ]);
        Route::put('/cart/{id}',[
            'as'=>'cart.update',
            'uses'=>'CardController@update'
            ]);
        Route::get('/cart/checkout',[
            'as'=>'cart.checkout',
            'uses'=>'CardController@checkout'
            ]);
        Route::post('/cart/checkoutpost',[
            'as'=>'cart.postCheckout',
            'uses'=>'CardController@postCheckout'
            ]);
        /*xem lich xu mua hang*/
        Route::get('/history/checkout',[
            'as'=>'his.check',
            'uses'=>'HistoryController@index'
            ]);

    });
// **********end list route for customer

/*Dung cho khach hang*/
// Route::group(['middleware' => 'web'], function () {
//     Route::auth();
//     Route::get('/home', 'HomeController@index');
// });
Route::any('foo', function () {
    return 'Hello World';
});