@extends("app.layouts.template")

@section("app_title", "Absensi Santri")

@section("app_content")

<div class="">
    <div class="panel-title">
        <div class="title_left">
            <h3>
                @yield("app_title")
            </h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-book"></i> Data @yield("app_title")
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">NIS</th>
                                        <th>Nama</th>
                                        <th class="text-center">Jenjang</th>
                                        <th>Lokasi</th>
                                        <th class="text-center">Halaqah</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
