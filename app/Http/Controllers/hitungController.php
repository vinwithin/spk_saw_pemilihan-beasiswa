<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class hitungController extends Controller
{
    public $kriterias;
    public $alternatifs = [];
    public $nilais = [];
    public $minmax = [];
    public $terbobot = [];
    public $total = [];
    public $rank = [];
    public function index()
    {
        $title = 'Perhitungan';
        // $kriterias = [];
        
        
        foreach (Kriteria::orderBy('id')->get() as $kriteria)
            $kriterias[$kriteria->id] = $kriteria;
        foreach (Alternatif::all() as $alternatif)
            $alternatifs[$alternatif->id] = $alternatif;
        foreach (Nilai::orderBy('id_alternatif')->orderBy('id_kriteria')->get() as $nilai)
            $nilais[$nilai->id_alternatif][$nilai->id_kriteria] = $nilai->nilai;

        $arr = [];
        foreach ($nilais as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$k][$key] = $v;
                // dd($arr[$k][$key]);
                
            }
        }
        // dd($arr);
        foreach ($arr as $key => $val) {
            $minmax[$key]['min'] = min($val);
            $minmax[$key]['max'] = max($val);
        //    dd($minmax[$key]['min']);
            
        }
        // dd($nilais);
        $normal1 = [];
       
        
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                // dd($minmax[29]['min']);
                // dd($kriterias[$k]->atribut);
                $normal1[$key][$k] = $kriterias[$key]->atribut === 'Benefit' ? $v / $minmax[$key]['max'] : $minmax[$key]['min'] / $v;               
            }
        }  
        $normal = [];
        foreach ($normal1 as $key => $val) {
            foreach ($val as $k => $v) {
                $normal[$k][$key] = $v;
                // dd($arr[$k][$key]);
                
            }
        }     

        $terbobot1 = [];
        foreach ($normal1 as $key => $val) {
            foreach ($val as $k => $v) {
                $terbobot1[$key][$k] = $v * $kriterias[$key]->bobot;
            }
        }
        
        foreach ($terbobot1 as $key => $val) {
            foreach ($val as $k => $v) {
                $terbobot[$k][$key] = $v;
                // dd($arr[$k][$key]);
                
            }
        }

        // $total1 = [];


        foreach ($terbobot as $key => $val) {
            $total[$key] = array_sum($val);
        }
        // dd($total);
        
        
        arsort($total);
       
        $no = 1;
        foreach ($total as $key => $val) {
            $rank[$key] = $no++;
        }
        // dd($rank);
        ksort($total);
        return view('hitung.index', compact('title', 'kriterias', 'alternatifs', 'nilais', 'minmax', 'normal', 'terbobot', 'total', 'rank'));

    }
    
}
