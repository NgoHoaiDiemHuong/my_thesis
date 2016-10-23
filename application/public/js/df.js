$(document).ready(function() {
    $("a.catalog").click(function(e){
        e.preventDefault();
        $.ajax({url: $(this).attr('href'), success: function(result){
            $("#content").fadeOut();
            $("#search-results").html(result).fadeIn("slow");
            console.log(result);
        }});
        e.preventDefault();
    });


    $( ".so_luong" ).on('change',function() {
        var id= $(this).attr('name');
        var sl= this.value;

        var data ={
            so_luong:sl,
            id:id
        }
        alert(data);
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
            });
              console.log(data);
        $.ajax({
            type: "POST",
            url: "{{route('cart.change_soluong')}}",
            data: data,
            success: function(data){
                // $('#btn-cart').load(document.URL+' #btn-cart').fadeIn();
                $('#bill-wraper').load(document.URL+' #bill-wraper').fadeIn();
                // $('#bill').load();
                alert(data);
            },
            dataType: 'json',
            timeout: 2*1000,
            error: function (data) {
                console.log('Error:', data);
                // $('div.rx').html(data);
            }
        }).done;
    });

});

