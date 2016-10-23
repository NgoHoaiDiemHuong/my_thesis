<div class="row">
                <div class="col-sm-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-8 col-lg-offset-8 " style="padding-bottom: 10px; float: right;">

                    <a href="{{route('cart.index')}}" title="" id="btn-cart" class="w3-btn w3-red" style="float:right;">
                        <i style="color: #f5f5f5" class="fa fa-shopping-cart fa-2x pull-left"></i>
                        <span class="badge">
                        {{ Cart::instance('main')->count(false) }}
                        </span>
                    </a>
                </div>
            </div>

            <div class="row">
                    <div class="col-sm-12 col-md-8 col-md-offset-4 col-lg-offset-4 col-lg-8" >
                         <div class="input-group">
                              <input id="search" onkeydown="down()" onkeyup="up()" type="text" class="form-control" placeholder="Tìm kiếm" >
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                              </span>
                            </div><!-- /input-group -->
                    </div>
            </div>