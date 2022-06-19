@php
$data_kategori = \App\Models\Kategori::all();
$blogs = \App\Models\Blog::latest()->paginate(6);
@endphp
<div class="sidebar">

    <h3 class="sidebar-title">Cari</h3>
    <div class="sidebar-item search-form">
        <form action="">
            <input type="text">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <h3 class="sidebar-title">Kategori</h3>
    <div class="sidebar-item categories">
        <ul>
            @forelse ($data_kategori as $data)
                @php
                    $jumlah = \App\Models\Blog::where('id_kategori', $data->id)->count();
                @endphp
                <li>
                    <a href="{{ url('/' . $data->slug) }}"> {{ $data->kategori }}
                        <span>({{ $jumlah }})</span>
                    </a>
                </li>
            @empty
                <div class="alert alert-danger">
                    Tidak Ada Kategori
                </div>
            @endforelse
        </ul>
    </div>

    <h3 class="sidebar-title">Post Terbaru</h3>
    <div class="sidebar-item recent-posts">
        @forelse ($blogs as $data)
            <div class="post-item clearfix">
                <img src="{{ url('storage/' . $data->foto) }}" alt="{{ $data->judul }}" height="50"
                    width="50">
                <h4 class="text-capitalize"><a href="{{ url('/' . $data->slug) }}">{{ $data->judul }}</a>
                </h4>
                <time
                    datetime="{{ $data->created_at }}">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('MMM D, Y') }}</time>
            </div>
        @empty
            <div class="post-item clearfix">
                <div class="alert alert-danger">
                    Tidak Ada Post
                </div>
            </div>
        @endforelse
    </div>
</div>
