
<div class="list-group" style="overflow: auto; background-color: transparent;">

@foreach($data as $d)

   @if($d->sl_ton_kho<=0)
   <a href="#" class="list-group-item " id = "elm" name= "{{$d->id}}" style="background-color: rgba(255,0,0,0.4); ">
   <div>
        <h4 class="list-group-item-heading">{{$d->ten_hang_hoa}}</h4>
        <p class="list-group-item-text">{{$d->ma_hh}}</p>
        <p><b>HẾT HÀNG</b></p>
    </div>
  </a>
   @else
   <a onclick="addHangHoa({{json_encode($d)}})" href="#" class="list-group-item " id = "elm" name= "{{$d->id}}" style="background-color: rgba(46, 204, 113,0.4); ">
   <div onclick="addHangHoa({{json_encode($d)}})" >
        <h4 class="list-group-item-heading">{{$d->ten_hang_hoa}}</h4>
        <p class="list-group-item-text">{{$d->ma_hh}}</p>
    </div>
  </a>
   @endif

@endforeach
</div>
