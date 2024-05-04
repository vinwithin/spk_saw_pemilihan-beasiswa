<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class alternatifController extends Controller
{
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
        ]);
        if ($nilai['nilai_raport'] >= 90) {
            $nilai['nilai_raport'] = 5;
        } elseif ($nilai['nilai_raport'] < 90 && $nilai['nilai_raport'] > 74) {
            $nilai['nilai_raport'] = 4;
        } elseif ($nilai['nilai_raport'] < 74 && $nilai['nilai_raport'] > 59) {
            $nilai['nilai_raport'] = 3;
        } elseif ($nilai['nilai_raport'] < 59 && $nilai['nilai_raport'] > 54) {
            $nilai['nilai_raport'] = 2;
        } else{
            $nilai['nilai_raport'] = 1;
        }

        if ($nilai['penghasilan_ortu'] > 3500000) {
            $nilai['penghasilan_ortu'] = 5;
        } elseif ($nilai['penghasilan_ortu'] <= 3500000 && $nilai['penghasilan_ortu'] > 2500000) {
            $nilai['penghasilan_ortu'] = 4;
        } 
         elseif ($nilai['penghasilan_ortu'] <= 2500000 && $nilai['penghasilan_ortu'] > 1500000) {
            $nilai['penghasilan_ortu'] = 3;
        } 
         elseif ($nilai['penghasilan_ortu'] <= 1500000 && $nilai['penghasilan_ortu'] > 1000000) {
            $nilai['penghasilan_ortu'] = 2;
        
        } else{
            $nilai['nilai_raport'] = 1;
        }

        if ($nilai['tanggungan_ortu'] > 4) {
            $nilai['tanggungan_ortu'] = 5;
        } elseif ($nilai['tanggungan_ortu'] = 4 ) {
            $nilai['tanggungan_ortu'] = 4;
        } elseif ($nilai['tanggungan_ortu'] = 3 ) {
            $nilai['tanggungan_ortu'] = 3;
        } elseif ($nilai['tanggungan_ortu'] = 2 ) {
            $nilai['tanggungan_ortu'] = 2;
        } else{
            $nilai['tanggungan_ortu'] = 1;

        }

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
            ]);
            $result = Alternatif::where('id', $id)->update($validateData);
            if ($result) {
                return redirect('/alternatif')->with('success', 'Berhasil mengubah data');
            } else {
                return redirect('/alternatif')->with("error", "Gagal mengubah data!");
            }
        
    }
    public function destroy(String $id)
    {
        Alternatif::where('id', $id)->delete();
        return redirect('/alternatif')->with('success', 'Alternatif Berhasil Dihapus!');
    }
}
