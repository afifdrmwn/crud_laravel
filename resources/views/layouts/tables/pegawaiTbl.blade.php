@php $no = 1; @endphp
@foreach($pegawai as $p)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $p->nama }}</td>
    <td>{{ $p->notelp }}</td>
    <td>{{ $p->email }}</td>
    <td>{{ $p->alamat }}</td>
    <td>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$p->id}}">Edit</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{$p->id}}">Hapus</button>
    </td>
</tr>
@endforeach
