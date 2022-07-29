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

    <div class="modal fade" id="filterSer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Seragam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    @csrf
                    <input type="hidden" name="sortBy" value="{{ $data->sortBy }}">
                    <input type="hidden" name="sortType" value="{{ $data->sortType }}">
                    <input type="hidden" name="search" value="{{ $data->search }}">
                    <div class="modal-body">
                        <select class="form-select" name="ukuran_seragam">
                            <option selected>All</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>

                        <select class="form-select" name="jenis_seragam">
                            <option selected>All</option>
                            <option>Olahraga</option>
                            <option>Batik</option>
                            <option>Pramuka</option>
                            <option>Muslim</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" formaction="{{ url("/") }}">Apply</button>
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
            <div class="col-2 col-md-1">
                <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#filterSer">
                    Filter
                </button>
            </div>
            <div class="col-8 col-md-8">

                <form class="d-flex" role="search" method="POST">
                    @csrf
                    <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                    <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                    <input type="hidden" name="sortBy" value="{{ $data->sortBy }}">
                    <input type="hidden" name="sortType" value="{{ $data->sortType }}">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button formaction="{{ url("/") }}" class="btn btn-outline-success me-3" type="submit">Search</button>
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
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                                <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                                <input type="hidden" name="sortBy" value="created_at">
                                <input type="hidden" name="sortType" value="asc">
                                <input type="hidden" name="search" value="{{ $data->search }}">
                                <button formaction="{{ url("/") }}" class="text-dark"><i class="fa-solid fa-arrow-down"></i></button>
                            </form>
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                                <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                                <input type="hidden" name="sortBy" value="created_at">
                                <input type="hidden" name="sortType" value="desc">
                                <input type="hidden" name="search" value="{{ $data->search }}">
                                <button formaction="{{ url("/") }}" class="text-dark"><i class="fa-solid fa-arrow-up"></i></button>
                            </form>
                        </span>
                    </th>
                    <th>
                        <span>
                            Ukuran
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                                <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                                <input type="hidden" name="sortBy" value="ukuran">
                                <input type="hidden" name="sortType" value="asc">
                                <input type="hidden" name="search" value="{{ $data->search }}">
                                <button formaction="{{ url("/") }}" class="text-dark"><i class="fa-solid fa-arrow-down"></i></button>
                            </form>
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                                <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                                <input type="hidden" name="sortBy" value="ukuran">
                                <input type="hidden" name="sortType" value="desc">
                                <input type="hidden" name="search" value="{{ $data->search }}">
                                <button formaction="{{ url("/") }}" class="text-dark"><i class="fa-solid fa-arrow-up"></i></button>
                            </form>
                        </span>
                    </th>
                    <th>
                        <span>
                            Jenis Seragam
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                                <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                                <input type="hidden" name="sortBy" value="jenis">
                                <input type="hidden" name="sortType" value="asc">
                                <input type="hidden" name="search" value="{{ $data->search }}">
                                <button formaction="{{ url("/") }}" class="text-dark"><i class="fa-solid fa-arrow-down"></i></button>
                            </form>
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                                <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                                <input type="hidden" name="sortBy" value="jenis">
                                <input type="hidden" name="sortType" value="desc">
                                <input type="hidden" name="search" value="{{ $data->search }}">
                                <button formaction="{{ url("/") }}" class="text-dark"><i class="fa-solid fa-arrow-up"></i></button>
                            </form>
                        </span>
                    </th>
                    <th>
                        <span>
                            Harga
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                                <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                                <input type="hidden" name="sortBy" value="harga">
                                <input type="hidden" name="sortType" value="asc">
                                <input type="hidden" name="search" value="{{ $data->search }}">
                                <button formaction="{{ url("/") }}" class="text-dark"><i class="fa-solid fa-arrow-down"></i></button>
                            </form>
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="ukuran_seragam" value="{{ $data->ukuran_seragam }}">
                                <input type="hidden" name="jenis_seragam" value="{{ $data->jenis_seragam }}">
                                <input type="hidden" name="sortBy" value="harga">
                                <input type="hidden" name="sortType" value="desc">
                                <input type="hidden" name="search" value="{{ $data->search }}">
                                <button formaction="{{ url("/") }}" class="text-dark"><i class="fa-solid fa-arrow-up"></i></button>
                            </form>
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
