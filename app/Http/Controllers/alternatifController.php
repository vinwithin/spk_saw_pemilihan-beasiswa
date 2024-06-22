<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class alternatifController extends Controller
{
    // Fungsi untuk mengubah nilai raport ke skala 1-5

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
