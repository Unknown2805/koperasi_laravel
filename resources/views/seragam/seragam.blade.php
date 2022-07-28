@extends('welcome')
@section('main')
<section>
<div class="card card-info ms-3 me-3 mt-3 mb-3">


    <div class="modal fade" id="addSer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Seragam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('store-seragam') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Ukuran</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ukuran" name="ukuran" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Jenis</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Jenis Seragam" name="jenis" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Harga Seragam" name="harga" autocomplete="off">
                        </div>
                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($seragam as $d)
        <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  
                    <form action={{ url('/delete-Ser/delete/' . $d->id) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <center class="mt-3">
                                <h5>
                                    apakah anda yakin ingin menghapus data ini?
                                </h5>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Hapus!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="card-body">

        
        <div class="row">
            <div class="col-2 col-md-1">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSer">
                    Add +
                </button>
            </div>
            <div class="col-2 col-sm-1">
                <div class="dropdown show">
                    <a class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Ukuran
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url("filt-uk-s")}}" name="uk_s">S</a></li>
                          <li><a class="dropdown-item" href="{{url("filt-uk-m")}}" name="uk_m">M</a></li>
                          <li><a class="dropdown-item" href="{{url("filt-uk-l")}}" name="uk_l">L</a></li>
                          <li><a class="dropdown-item" href="{{url("filt-uk-xl")}}" name="uk_xl">XL</a></li>

                        </ul>
                    </a>
                </div>
            </div>
            <div class="col-2 col-sm-2">
                <div class="dropdown show">
                    <a class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Jenis Seragam
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url("filt-jen-ol")}}" name="jen_ol">Olahraga</a></li>
                          <li><a class="dropdown-item" href="{{url("filt-jen-btk")}}" name="jen_btk">Batik</a></li>
                          <li><a class="dropdown-item" href="{{url("filt-jen-prmk")}}" name="jen_prmk">Pramuka</a></li>
                          <li><a class="dropdown-item" href="{{url("filt-jen-mslm")}}" name="jen_mslm">Muslim</a></li>

                        </ul>
                    </a>
                </div>
            </div>
            <div class="col-8 col-md-8">

                <form class="d-flex" role="search" action={{url('cari-ser')}}>
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-outline-success me-3" type="submit">Search</button>
                </form>
            </div>
        
        </div>

        <table class="table table-striped" id="table1">
            <thead>
                
                <tr>
                    <th>No</th>
                    <th>
                        <span>
                            Tanggal
                            <a class="text-dark" href="{{ url("/asc-ser-tgl")}}" name="tanggal"><i class="fa-solid fa-arrow-down"></i></a>
                            <a class="text-dark" href="{{ url("/desc-ser-tgl")}}" name="tanggal"><i class="fa-solid fa-arrow-up"></i></a>
                        </span>
                    </th>
                    <th>
                        <span>
                            Ukuran
                            <a class="text-dark" href="{{ url("/asc-ser-uk")}}" name="ukuran"><i class="fa-solid fa-arrow-down"></i></a>
                            <a class="text-dark" href="{{ url("/desc-ser-uk")}}" name="ukuran"><i class="fa-solid fa-arrow-up"></i></a>
                        </span>
                    </th>
                    <th>
                        <span>
                            Jenis Seragam
                            <a class="text-dark" href="{{ url("/asc-ser-jen")}}" name="jenis"><i class="fa-solid fa-arrow-down"></i></a>
                            <a class="text-dark" href="{{ url("/desc-ser-jen")}}" name="jenis"><i class="fa-solid fa-arrow-up"></i></a>
                        </span>
                    </th>
                    <th>
                        <span>
                            Harga
                            <a class="text-dark" href="{{ url("/asc-ser-har")}}" name="harga"><i class="fa-solid fa-arrow-down"></i></a>
                            <a class="text-dark" href="{{ url("/desc-ser-har")}}" name="harga"><i class="fa-solid fa-arrow-up"></i></a>
                        </span>
                    </th>
                 
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        
        
                @foreach ($seragam as $ser)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ser->created_at }}</td>
                    <td>{{ $ser->ukuran }}</td>
                    <td>{{ $ser->jenis }}</td>
                    <td>{{ $ser->harga }}</td>
                    <td>
                        <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editSer{{ $ser->id }}">Edit</i></a>
                        <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $ser->id }}">delete</i></a>

                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('seragam/editseragam')
</section>

@endsection
