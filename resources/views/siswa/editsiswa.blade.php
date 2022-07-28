@foreach ($siswa as $d)

<div class="modal fade" id="editSis{{$d ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah harga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('edit-siswa/' . $d ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nama" name="nama" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="kelas" name="kelas" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">NISN</label>
                        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="NISN" name="nisn" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Absen</label>
                        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Absen" name="absen" autocomplete="off">
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



@endforeach
