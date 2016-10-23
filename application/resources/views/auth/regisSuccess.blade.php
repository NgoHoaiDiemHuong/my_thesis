@extends('layouts.master')
@section('css')
@endsection
@section('content')
<div class="container">
<div class="clearfix"></div>
<br>
<div class="row">
<div class="jumbotron">
    <h2>Chúc mừng bạn đã đăng kí thành công</h2>

    <a href="{{url('/')}}" title=""><h5>Quay lại trang chủ</h5></a>
</div>
</div>

</div>
</div>
@endsection
<!-- @section('js')
        <script>
            (function() {

            // Create input element for testing
            var inputs = document.createElement('input');

            // Create the supports object
            var supports = {};

            supports.autofocus   = 'autofocus' in inputs;
            supports.required    = 'required' in inputs;
            supports.placeholder = 'placeholder' in inputs;

            // Fallback for autofocus attribute
            if(!supports.autofocus) {

            }

            // Fallback for required attribute
            if(!supports.required) {

            }

            // Fallback for placeholder attribute
            if(!supports.placeholder) {

            }

            // Change text inside send button on submit
            var send = document.getElementById('register-submit');
            if(send) {
                send.onclick = function () {
                    this.innerHTML = '...Sending';
                }
            }

        })();
        </script>
@endsection -->