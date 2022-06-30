@extends('.app.layouts.template')

@section('app_title', 'Kelola Hak Akses')

@section('app_content')

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/users') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
                {{-- <li class="breadcrumb-item active" aria-current="page">{{ $user->nama }}</li> --}}
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div id="message"></div>
            <div class="x_panel">
                <div class="x_title">
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">
                                <table class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Hak Akses</th>
                                            <th>Akses</th>
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

@section('app_scripts')

    <script>
        $(document).ready(function() {
            loadData();
            setInterval(() => {
                $("#message").empty()
            }, 5000);
        });

        function loadData() {
            $.ajax({
                url: "{{ Request::url() }}/table",
                success: function(response) {
                    $('tbody').html(response);
                }
            });
        }
    </script>

@endsection
