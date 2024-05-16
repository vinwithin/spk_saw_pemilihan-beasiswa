@extends('layout.index')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Perhitungan SAW</h3>
      </div>
      <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Perhitungan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-normalisasi-tab" data-toggle="pill" href="#pills-normalisasi" role="tab" aria-controls="pills-normalisasi" aria-selected="false">Normalisasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-terbobot-tab" data-toggle="pill" href="#pills-terbobot" role="tab" aria-controls="pills-terbobot" aria-selected="false">Terbobot</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-ranking-tab" data-toggle="pill" href="#pills-ranking" role="tab" aria-controls="pills-ranking" aria-selected="false">Ranking</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="d-flex card shadow p-3">
              <div class="table-responsive col-lg-12">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      @foreach ($kriterias as $kriteria)
                      <th>{{ $kriteria->nama_kriteria }}({{ $kriteria->atribut }}: {{ $kriteria->bobot }})</th>
                      @endforeach
                      <th scope="col">Min</th>
                      <th scope="col">Max</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($nilais as $key => $val)
                    <tr>
                      <td>{{ $key }}</td>
                      <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                      @foreach ($val as $k => $v)
                      <td>{{ $v }}</td>
                      @endforeach
                      <td>{{ $minmax[$key]['min'] }}</td>
                      <td>{{ $minmax[$key]['max'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-normalisasi" role="tabpanel" aria-labelledby="pills-normalisasi-tab">
            <div class="d-flex card shadow p-3">
              <div class="table-responsive col-lg-12">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      @foreach ($kriterias as $kriteria)
                      <th>{{ $kriteria->nama_kriteria }}({{ $kriteria->atribut }}: {{ $kriteria->bobot }})</th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($normal as $key => $val)
                    <tr>
                      <td>{{ $key }}</td>
                      @foreach ($val as $k => $v)
                      <td>{{ round($v, 4) }}</td>
                      @endforeach
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-terbobot" role="tabpanel" aria-labelledby="pills-terbobot-tab">
            <div class="d-flex card shadow p-3">
              <div class="table-responsive col-lg-12">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      @foreach ($kriterias as $kriteria)
                      <th>{{ $kriteria->nama_kriteria }}({{ $kriteria->atribut }}: {{ $kriteria->bobot }})</th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($terbobot as $key => $val)
                    <tr>
                      <td>{{ $key }}</td>
                      @foreach ($val as $k => $v)
                      <td>{{ round($v, 4) }}</td>
                      @endforeach
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-ranking" role="tabpanel" aria-labelledby="pills-ranking-tab">
            <div class="d-flex card shadow p-3">
              <div class="table-responsive col-lg-12">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Rank</th>
                      <th scope="col">Id</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rank as $key => $val)
                    <tr>
                      <td>{{ $val }}</td>
                      <td>{{ $key }}</td>
                      <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                      <td>{{ round($total[$key], 4) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
