@extends('layout.index')
@section('content')
        <div class="col-md-8">
            <div class="card shadow p-2">
                <div class="card-header">
                    <form method="post" action="/alternatif/update/{{ $alternatif->id }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="nama_alternatif"
                                        value="{{ $alternatif->nama_alternatif }}" required>

                                </div>
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis"
                                        value="{{ $alternatif->nis }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan"
                                        value="{{ $alternatif->jurusan }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas"
                                        value="{{ $alternatif->kelas }}" required>
                                </div>
                            </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <p>IPK</p>
                                <select class="form-select" aria-label="Default select example" name="nilai_raport"
                                    required>
                                    <option selected>Pilih</option>
                                    <option value="1">0 - 0.8</option>
                                    <option value="2">0.9 - 1.6</option>
                                    <option value="3">1.7 - 2.4</option>
                                    <option value="4">2.5 - 3.2</option>
                                    <option value="5">3.3 - 4.0</option>
                                </select>

                            </div>
                            <div class="mb-3">

                                <p>Penghasilan Orang Tua</p>
                                <select class="form-select" aria-label="Default select example" name="penghasilan_ortu"
                                    required>
                                    <option selected>Pilih</option>
                                    <option value="1">0 - 1.000.000</option>
                                    <option value="2">1.000.000 - 2.000.000</option>
                                    <option value="3">2.000.000 - 3.000.000</option>
                                    <option value="4">3.000.000 - 5.000.000</option>
                                    <option value="5">Lebih dari 5.000.000</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <p>Tanggungan Orang Tua</p>
                                <select class="form-select" aria-label="Default select example" name="tanggungan_ortu"
                                    required>
                                    <option selected>Pilih</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5 atau lebih</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <p>Nilai Toefl</p>
                                <select class="form-select" aria-label="Default select example" name="nilai_toefl" required>
                                    <option selected>Pilih</option>
                                    <option value="1">0 - 310</option>
                                    <option value="2">311 - 420</option>
                                    <option value="3">421 - 480</option>
                                    <option value="4">481 - 520</option>
                                    <option value="5">lebih dari 520</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <p>Jumlah Organisasi Yang Diikuti</p>
                                <select class="form-select" aria-label="Default select example" name="jumlah_organisasi"
                                    required>
                                    <option selected>Pilih</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5 atau lebih</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <a href="/alternatif" class="btn btn-warning w-25">Kembali</a>
                        <input value="Submit" type="submit" class="btn btn-primary w-25">

                </div>
            </div>
        </div>
        </form>
    @endsection
