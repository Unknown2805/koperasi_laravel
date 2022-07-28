@extends('welcome')
@section('main')
<section>
    <div class="card card-info ms-3 me-3 mt-3 mb-3"> 
        <div class="row ms-3 mt-3">
            

            <div class="col-2 col-sm-3">
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
        </div>
        <table class="table table-striped col-12 col-md-12 " id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>  
                    <th> Ukuran</th>
                    <th>Jenis Seragam</th>
                    <th>Harga</th>

    
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
                      
                 
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    @include('seragam/editseragam')

</section>
@endsection