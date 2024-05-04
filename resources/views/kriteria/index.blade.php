@extends('layout.index')
@section('content')
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
@if (session()->has("error"))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Daftar Alternatif</h4>
        <div class="card-header-form">
            <div class="input-group">
              <div class="input-group-btn">
                <a class="btn btn-primary" href="alternatif/create">Tambah Data</a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
             
              <th>no</th>
              <th>Nama Kriteria</th>
              <th>Atribut</th>
              <th>Bobot</th>
              <th>Action</th>
            </tr>
            @foreach ($kriteria as $item)
            <tr>
             <td>{{$loop->iteration}}</td>
              <td>{{$item->nama_kriteria}}</td>
              <td>{{$item->atribut}}</td>
              <td>{{$item->bobot}}</td>
              <td><span><a href="/alternatif/edit/{{ $item->id }}" class="btn btn-warning">Edit</a> <a href="/alternatif/delete/{{ $item->id }}" class="btn btn-danger">Hapus</a></span></td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection