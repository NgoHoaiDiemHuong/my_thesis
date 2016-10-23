// ******************************add hang hoa vao table*/
    // dinh nghia tung dong cua bang

    var HangHoasViewModel;
    function hanghoa(data) {
        var self = this;

        self.ma_hh = ko.observable(data.ma_hh);
        self.ten_hang_hoa = ko.observable(data.ten_hang_hoa);
        self.so_luong = ko.observable(data.so_luong!=null?data.so_luong:0);
        self.sl_nhap = ko.observable(data.sl_nhap!=null?data.sl_nhap:0);
        self.sl_ton_kho = ko.observable(data.sl_ton_kho!=null?data.sl_ton_kho:0);
        self.sl_thuc_te = ko.observable('0');
        self.don_gia = ko.observable(data.don_gia?data.don_gia:"1000");
        self.thanh_tien = ko.computed(function(){
            return  Number(self.don_gia())*Number(self.so_luong())?Number(self.don_gia())*Number(self.so_luong()):"0";
        });

        self.removeHangHoa = function(hanghoa) {
            HangHoasViewModel.hanghoas.remove(this);
        };
        var i;
        var limit = Number(self.sl_nhap())< Number(self.sl_ton_kho)?Number(self.sl_nhap()):Number(self.sl_ton_kho());
        var sl_tra = [];
        for (i = 0; i <= limit ; i++) {
            sl_tra.push(i);
        }
        // var limit_ban =Number(self.sl_ton_kho());
        var sl_ban = [];
        for (i = 1; i <= Number(data.sl_ton_kho) ; i++) {
            sl_ban.push(i);
        }
        self.sl_tra = ko.observableArray(sl_tra);
        self.sl_ban = ko.observableArray(sl_ban);
        self.thanh_tien = ko.computed(function(){
            return  Number(self.don_gia())*Number(self.so_luong())?Number(self.don_gia())*Number(self.so_luong()):"0";
        });
        // self.selectedsl_tra = ko.observable()
    };
// Dinh nghia lai ham add
    function addHangHoa (data) {
            var x = true;
            HangHoasViewModel.hanghoas().forEach(function(item){
                if(data.ma_hh==item.ma_hh()){
                    var newValue = Number(item.so_luong()) + 1;
                    item.so_luong(newValue);
                    x = false;/*khong the them dong moi vi da bi trung*/
                }
            });
            if(x==true) HangHoasViewModel.hanghoas.push(new hanghoa(data));

        };

//Xay dung bang
     function functionHangHoasViewModel(dt) {
        var self = this;
        if (dt != null) {
            self.hanghoas = ko.observableArray(dt); // <-------
        } else {
            self.hanghoas = ko.observableArray();
        }
        // Operations
        this.tong_tien =ko.observable('0');
        this.addHangHoa = function (data) {
            self.hanghoas.push(new hanghoa(data));
        };
        this.removeHangHoa = function(item){
            self.hanghoas.remove(item);
        };
        this.tong_tien = ko.computed(function(){
            var a = 0;
            self.hanghoas().forEach(function(item) {
                    a =  Number(a) + Number(item.thanh_tien());
                });
            return a;
        });
        this.tien_kh_dua = ko.computed(function(){
            var a = 0;
            self.hanghoas().forEach(function(item) {
                    a =  Number(a) + Number(item.thanh_tien());
                });
            return a;
        });

    };
/*ket thuc xay dung model*/
    HangHoasViewModel = new functionHangHoasViewModel();
// Cau lenh khoi tao cai bang
    ko.applyBindings(HangHoasViewModel,document.getElementById("table"));
/*end hang hoa vao table*/



$(document).ready(function(){
    $("update-form").submit(function(event){
        event.preventDefault();
        var data =$("update-form").serialize()
        console.log( data);
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
        });
        $.ajax({
            type: "POST",
            url: "{{route('emp.price.store')}}",
            data: data,
            success: function(data){
                console.log('ss:', data);
            },
            dataType: 'json',
            error: function (data) {
                console.log('Error:', data);

            }
        });
    });

});
