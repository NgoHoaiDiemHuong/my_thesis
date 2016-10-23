 @if(Session::has('success'))
    <!-- <div class="w3-container w3-green"> -->
    <div class="w3-display-topright w3-container w3-green" style="width:60%;">
    <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">×</span>
    <h3>{{Session::get('success')}}</h3>
    <!-- <h3>Danger!</h3> -->
    <!-- <p>Red often indicates a dangerous or potentially negative action.</p> -->
    </div>
@endif
@if(Session::has('danger'))
    <!-- <div class="w3-container w3-section w3-red"> -->
    <div class="w3-display-topright w3-container w3-red" style="width:60%;">
    <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">×</span>
    <h3>{{Session::get('danger')}}</h3>
    <!-- <h3>Danger!</h3> -->
    <!-- <p>Red often indicates a dangerous or potentially negative action.</p> -->
    </div>
@endif
@if(Session::has('warning'))
    <div class="w3-container w3-section w3-red">
    <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">×</span>
    <h3>{{Session::get('warning')}}</h3>
    <!-- <h3>Danger!</h3> -->
    <!-- <p>Red often indicates a dangerous or potentially negative action.</p> -->
    </div>
@endif
@if(Session::has('info'))
    <div class="w3-container w3-section w3-blue">
    <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">×</span>
    <h3>{{Session::get('warning')}}</h3>
    <!-- <h3>Danger!</h3> -->
    <!-- <p>Red often indicates a dangerous or potentially negative action.</p> -->
    </div>
@endif

