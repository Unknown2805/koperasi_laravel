@foreach ($seragam as $d)

<div class="modal fade" id="editSer{{$d ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Keterangan Seragam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('edit-seragam/' . $d ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Ukuran Seragam</label>
                        <input type="string" class="form-control"  value="{{$d->ukuran}}" id="formGroupExampleInput2" min="1" placeholder="Products" name="ukuran" autocomplete="off" value="{{$d->keluar}}">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Jenis Seragam</label>
                        <input type="string" class="form-control"  value="{{$d->jenis}}" id="formGroupExampleInput2" min="1" placeholder="Products" name="jenis" autocomplete="off" value="{{$d->keluar}}">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Harga Seragam</label>
                        <input type="number" class="form-control" min="1" value="{{$d->harga}}" id="formGroupExampleInput2" min="1" placeholder="Products" name="harga" autocomplete="off" value="{{$d->keluar}}">
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
