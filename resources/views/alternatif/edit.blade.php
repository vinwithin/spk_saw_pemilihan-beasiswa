@extends('layout.index')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <form method="post" action="/alternatif/update/{{ $alternatif->id }}">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="nama_alternatif" value="{{$alternatif->nama_alternatif}}" required>
    
                            </div>
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" value="{{$alternatif->nis}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{$alternatif->jurusan}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="{{$alternatif->kelas}}" required>
                            </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nilai_raport" class="form-label">Nilai Rata-Rata Raport</label>
                                <input type="text" class="form-control" id="nilai_raport" name="nilai_raport" required> 
    
                            </div>
                            <div class="mb-3">
                                <label for="penghasilan_ortu" class="form-label">Penghasilan Orang tua</label>
                                <input type="text" class="form-control" id="penghasilan_ortu" name="penghasilan_ortu" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggungan_ortu" class="form-label">Tanggungan Orang Tua</label>
                                <input type="text" class="form-control" id="tanggungan_ortu" name="tanggungan_ortu" required>
                            </div>
                            <div class="mb-3">
                                <label for="penghasilan_ortu" class="form-label">Nilai TOEFL</label>
                                <input type="text" class="form-control" id="penghasilan_ortu" name="nilai_toefl" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggungan_ortu" class="form-label">Jumlah Organisasi yang Diikuti</label>
                                <input type="text" class="form-control" id="tanggungan_ortu" name="jumlah_organisasi" required>
                            </div>
                             
    
                            <input value="Submit" type="submit" class="btn btn-primary">
                        
                </div>
            </div>
        </div>
        </form>
    @endsection
