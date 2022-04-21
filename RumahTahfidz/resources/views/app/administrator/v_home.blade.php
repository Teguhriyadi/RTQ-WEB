@extends("app.layouts.template")

@section('app_title', 'Home')

@section('app_content')

    <div>
        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small>Some examples to get you started</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-user"></i>
                </div>
                <div class="count">179</div>
                <h3>Total Admin</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-newspaper-o"></i>
                </div>
                <div class="count">179</div>
                <h3>News</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-file-o"></i>
                </div>
                <div class="count">179</div>
                <h3>Reports</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-circle"></i>
                </div>
                <div class="count">179</div>
                <h3>Online Users</h3>
            </div>
        </div>
    </div>

@endsection
