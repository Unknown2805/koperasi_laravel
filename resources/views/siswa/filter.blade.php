@extends('welcome')
@section('main')
<section>
<div class="card card-info ml-3 mt-3 mb-3">

        <div class="card-body">

            <div class="row">
                <div class="col-2 col-md-2">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSis">
                        Add +
                    </button>
                </div>
                <div class="col-2 col-sm-2">
                    <div class="dropdown show">
                        <a class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kelas
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url("filt-kls-10")}}" name="kls_10">10</a></li>
                            <li><a class="dropdown-item" href="{{url("filt-kls-11")}}" name="kls_11">11</a></li>
                            <li><a class="dropdown-item" href="{{url("filt-kls-12")}}" name="kls_12">12</a></li>
                            </ul>
                        </a>
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <form class="d-flex" role="search" action={{url('cari-sis')}}>
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
                                <a class="text-dark" href="{{ url("/asc-sis-tgl")}}" name="tanggal"><i class="fa-solid fa-arrow-down"></i></a>
                                <a class="text-dark" href="{{ url("/desc-sis-tgl")}}" name="tanggal"><i class="fa-solid fa-arrow-up"></i></a>
                            </span>
                        </th>
                        <th>
                            <span>
                                Nama
                                <a class="text-dark" href="{{ url("/asc-sis-nm")}}" name="nama"><i class="fa-solid fa-arrow-down"></i></a>
                                <a class="text-dark" href="{{ url("/desc-sis-nm")}}" name="nama"><i class="fa-solid fa-arrow-up"></i></a>
                            </span>
                        </th>
                        <th>
                            <span>
                                Kelas
                                <a class="text-dark" href="{{ url("/asc-sis-kls")}}" name="kelas"><i class="fa-solid fa-arrow-down"></i></a>
                                <a class="text-dark" href="{{ url("/desc-sis-kls")}}" name="kelas"><i class="fa-solid fa-arrow-up"></i></a>
                            </span>
                        </th>
                        <th>
                            <span>
                                NISN
                                <a class="text-dark" href="{{ url("/asc-sis-nisn")}}" name="nisn"><i class="fa-solid fa-arrow-down"></i></a>
                                <a class="text-dark" href="{{ url("/desc-sis-nisn")}}" name="nisn"><i class="fa-solid fa-arrow-up"></i></a>
                            </span>
                        </th>
                        <th>
                            <span>
                                Absen
                                <a class="text-dark" href="{{ url("/asc-sis-abs")}}" name="absen"><i class="fa-solid fa-arrow-down"></i></a>
                                <a class="text-dark" href="{{ url("/desc-sis-abs")}}" name="absen"><i class="fa-solid fa-arrow-up"></i></a>
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($siswa as $sis)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sis->created_at }}</td>
                        <td>{{ $sis->nama}}</td>
                        <td>{{ $sis->kelas}}</td>
                        <td>{{ $sis->nisn}}</td>
                        <td>{{ $sis->absen}}</td>
                        <td>
                            <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editSis{{ $sis->id }}">Edit</i></a>
                            <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $sis->id }}">delete</i></a>

                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('siswa/editsiswa')

    </section>
@endsection