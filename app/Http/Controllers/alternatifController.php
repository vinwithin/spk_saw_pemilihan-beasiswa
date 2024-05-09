<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class alternatifController extends Controller
{
    // Fungsi untuk mengubah nilai raport ke skala 1-5
function mapNilaiRaport($nilai) {
    if ($nilai >= 90) {
        return 5;
    } elseif ($nilai >= 75 && $nilai < 90) {
        return 4;
    } elseif ($nilai >= 60 && $nilai < 75) {
        return 3;
    } elseif ($nilai >= 55 && $nilai < 60) {
        return 2;
    } else {
        return 1;
    }
}

// Fungsi untuk mengubah penghasilan orang tua ke skala 1-5
function mapPenghasilanOrtu($penghasilan) {
    if ($penghasilan >= 3500000) {
        return 5;
    } elseif ($penghasilan >= 2500000 && $penghasilan < 3500000) {
        return 4;
    } elseif ($penghasilan >= 1500000 && $penghasilan < 2500000) {
        return 3;
    } elseif ($penghasilan >= 1000000 && $penghasilan < 1500000) {
        return 2;
    } else {
        return 1;
    }
}

// Fungsi untuk mengubah tanggungan orang tua ke skala 1-5
function mapTanggunganOrtu($tanggungan) {
    if ($tanggungan >= 5) {
        return 5;
    } elseif ($tanggungan == 4) {
        return 4;
    } elseif ($tanggungan == 3) {
        return 3;
    } elseif ($tanggungan == 2) {
        return 2;
    } else {
        return 1;
    }
}

function mapNilaiToefl($nilai) {
    if ($nilai >= 520) {
        return 5;
    } elseif ($nilai >= 481 && $nilai <= 519) {
        return 4;
    } elseif ($nilai >= 421 && $nilai <= 480) {
        return 3;
    } elseif ($nilai >= 311 && $nilai <= 420) {
        return 2;
    } else {
        return 1;
    }
}

function mapJumlahOrganisasi($jumlah) {
    if ($jumlah >= 5) {
        return 5;
    } elseif ($jumlah == 4) {
        return 4;
    } elseif ($jumlah == 3) {
        return 3;
    } elseif ($jumlah == 2) {
        return 2;
    } else {
        return 1;
    }
}

    public function index()
    {
        return view('alternatif.index', [
            'alternatif' => Alternatif::all(),
        ]);
    }
    public function show(){
        return view('alternatif.create');
    }
    public function store(Request $request)
    {
       // Memvalidasi data input untuk alternatif
        $validateData = $request->validate([
            'nama_alternatif' => 'required',
            'nis' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
        ]);

        // Membuat record alternatif baru
        $result = Alternatif::create($validateData);

        if (!$result) {
            return redirect('/alternatif')->with('error', 'Gagal menambahkan data!');
        }

        // Memvalidasi data input untuk nilai
        $nilai = $request->validate([
            'nilai_raport' => 'required',
            'penghasilan_ortu' => 'required',
            'tanggungan_ortu' => 'required',
            'nilai_toefl' => 'required',
            'jumlah_organisasi' => 'required',
        ]);
        $nilai['nilai_raport'] = $this->mapNilaiRaport($nilai['nilai_raport']);
        $nilai['penghasilan_ortu'] = $this->mapPenghasilanOrtu($nilai['penghasilan_ortu']);
        $nilai['tanggungan_ortu'] = $this->mapTanggunganOrtu($nilai['tanggungan_ortu']);
        $nilai['nilai_toefl'] = $this->mapNilaiToefl($nilai['nilai_toefl']);
        $nilai['jumlah_organisasi'] = $this->mapJumlahOrganisasi($nilai['jumlah_organisasi']);

        // Memasukkan nilai untuk setiap kriteria
        $nilaiAngka = array_values($nilai);

        // Memasukkan nilai untuk setiap kriteria
        foreach ($nilaiAngka as $index => $nilaiKriteria) {
            // Menggunakan indeks sebagai id_kriteria
            $idKriteria = $index + 1;
        
            // Membuat nilai baru menggunakan relasi
            $resultNilai = $result->nilais()->create([
                'id_kriteria' => $idKriteria,
                'nilai' => $nilaiKriteria,
            ]);
        
            // Periksa apakah nilai berhasil disimpan
            if (!$resultNilai) {
                return redirect('/alternatif')->with('error', 'Gagal menambahkan nilai!');
            }
        }

        // Jika semuanya berhasil, arahkan kembali dengan pesan sukses
        return redirect('/alternatif')->with('success', 'Berhasil menambahkan data dan nilai!');


    }
    public function edit(String $id)
    {

        // return "hallo";
        return view('/alternatif/edit', 
        [
            'alternatif' => Alternatif::find($id),
        ]);
    }

    public function update(Request $request, String $id)
    {
        
            $validateData = $request->validate([
                'nama_alternatif' => 'required',
                'nis' => 'required',
                'jurusan' => 'required',
                'kelas' => 'required',
            ]);
            $result = Alternatif::where('id', $id)->update($validateData);
            if (!$result) {
                return redirect('/alternatif')->with('error', 'Gagal menambahkan data!');
            }
    
            // Memvalidasi data input untuk nilai
            $nilai = $request->validate([
                'nilai_raport' => 'required',
                'penghasilan_ortu' => 'required',
                'tanggungan_ortu' => 'required',
                'nilai_toefl' => 'required',
                'jumlah_organisasi' => 'required',
            ]);
            $nilai['nilai_raport'] = $this->mapNilaiRaport($nilai['nilai_raport']);
            $nilai['penghasilan_ortu'] = $this->mapPenghasilanOrtu($nilai['penghasilan_ortu']);
            $nilai['tanggungan_ortu'] = $this->mapTanggunganOrtu($nilai['tanggungan_ortu']);
            $nilai['nilai_toefl'] = $this->mapNilaiToefl($nilai['nilai_toefl']);
            $nilai['jumlah_organisasi'] = $this->mapJumlahOrganisasi($nilai['jumlah_organisasi']);
    

            $nilaiAngka = array_values($nilai);


            foreach ($nilaiAngka as $index => $nilaiKriteria) {
                // Menggunakan indeks sebagai id_kriteria
                $idKriteria = $index + 1;

                // Mencari nilai yang sudah ada berdasarkan id_kriteria
                $resultNilai = Nilai::where('id_alternatif', $id)
                ->where('id_kriteria', $idKriteria)
                ->update(['nilai' => $nilaiKriteria]);

                if (!$resultNilai) {
                    return redirect('/alternatif')->with('error', 'Gagal menambahkan data!');
                }
            }
        return redirect('/alternatif')->with('success', 'Berhasil menambahkan data dan nilai!');

        
    }
    public function destroy(String $id)
    {
        Alternatif::where('id', $id)->delete();
        Nilai::where('id_alternatif', $id)->delete();
        return redirect('/alternatif')->with('success', 'Alternatif Berhasil Dihapus!');
    }
}
