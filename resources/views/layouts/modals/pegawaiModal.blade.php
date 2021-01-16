<!-- Edit Modal -->
@foreach ($pegawai as $p)
<div class="modal fade" id="editModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Pegawai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form id="myFormEdit{{ $p->id }}" idForm="{{ $p->id }}" action="/pegawai/update" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                <input type="hidden" name="id" value="{{$p->id}}"><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pegawai</label>
                    <input type="text" name="nama" value="{{$p->nama}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">No Telepon</label>
                    <input type="text" name="notelp" value="{{$p->notelp}}" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" name="email" value="{{$p->email}}" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat Pegawai</label>
                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Alamat Pegawai">{{$p->alamat}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="editData({{ $p->id }})" class="btn btn-primary">Simpan Data Pegawai</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Hapus Modal -->
@foreach ($pegawai as $p)
<div class="modal fade" id="hapusModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form action="/pegawai/hapus/{{$p->id}}" id="myFormDelete{{ $p->id }}"  method="GET">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    {{ csrf_field()}}
                    <input type="hidden" name="id" value="{{$p->id}}"><br>
                    Hapus Data Pegawai
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="deleteData({{ $p->id }})" class="btn btn-primary">Hapus Data Pegawai</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
