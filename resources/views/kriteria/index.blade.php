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
    <div class="card shadow p-2">
      <div class="card-header">
        <h4>Daftar Kriteria</h4>
        <div class="card-header-form">
            <div class="input-group">
              
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
             
            </tr>
            @foreach ($kriteria as $item)
            <tr>
             <td>{{$loop->iteration}}</td>
              <td>{{$item->nama_kriteria}}</td>
              <td>{{$item->atribut}}</td>
              <td>{{$item->bobot}}</td>
            
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection