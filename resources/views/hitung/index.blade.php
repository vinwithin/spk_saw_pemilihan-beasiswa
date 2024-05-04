@extends('layout.index')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perhitungan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Normalisasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Terbobot dan Rank</a>
            </li>
           
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
               <div class="d-flex card shadow p-3">
  
                  <div class="table-responsive col-lg-">
  
  
                      <form action="/artikel" method="get"
                          class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">
  
                      </form>
  
                      <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama</th>
  
                                  @foreach ($kriterias as $kriteria)
                                      <th>{{ $kriteria->nama_kriteria }}({{ $kriteria->atribut }}:
                                          {{ $kriteria->bobot }})</th>
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
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="d-flex card shadow p-3">
  
                <div class="table-responsive col-lg-">


                    

                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->nama_kriteria }}({{ $kriteria->atribut }}:
                                        {{ $kriteria->bobot }})</th>
                                @endforeach                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($normal as $key => $val)
                                <tr>
                                    <td>{{ $key }}</td>
                                    @foreach ($val as $k => $v)
                                        <td >{{ round($v, 4) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="d-flex card shadow p-3">
  
                <div class="table-responsive col-lg-">


                    <form action="/artikel" method="get"
                        class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">

                    </form>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                @foreach ($kriterias as $kriteria)
                                    <th>{{ $kriteria->nama_kriteria }}({{ $kriteria->atribut }}:
                                        {{ $kriteria->bobot }})</th>
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
                <div class="d-flex card shadow p-3">
  
                  <div class="table-responsive col-lg-">
  
  
                      <form action="/artikel" method="get"
                          class="form-inline mr-auto w-100 navbar-search justify-content-end mb-3">
  
                      </form>
  
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
  </div>
</div>
@endsection