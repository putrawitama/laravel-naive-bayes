<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diabete;

class NaiveCoreController extends Controller
{
    public function __construct() {
        //get dataset
        $this->ds_normal = Diabete::where('type', 'Normal')->get()->toArray();
        $this->ds_type2 = Diabete::where('type', 'Type2')->get()->toArray();
        $this->ds_type1 = Diabete::where('type', 'Type1')->get()->toArray();

        $this->naive = [
            'age' => [
                'type1' => [
                    'mean' => $this->mean($this->ds_type1, 'age'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'type2' => [
                    'mean' => $this->mean($this->ds_type2, 'age'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'normal' => [
                    'mean' => $this->mean($this->ds_normal, 'age'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'bsfast' => [
                'type1' => [
                    'mean' => $this->mean($this->ds_type1, 'bsfast'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'type2' => [
                    'mean' => $this->mean($this->ds_type2, 'bsfast'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'normal' => [
                    'mean' => $this->mean($this->ds_normal, 'bsfast'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'bspp' => [
                'type1' => [
                    'mean' => $this->mean($this->ds_type1, 'bspp'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'type2' => [
                    'mean' => $this->mean($this->ds_type2, 'bspp'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'normal' => [
                    'mean' => $this->mean($this->ds_normal, 'bspp'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'plasma_r' => [
                'type1' => [
                    'mean' => $this->mean($this->ds_type1, 'plasma_r'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'type2' => [
                    'mean' => $this->mean($this->ds_type2, 'plasma_r'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'normal' => [
                    'mean' => $this->mean($this->ds_normal, 'plasma_r'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'plasma_f' => [
                'type1' => [
                    'mean' => $this->mean($this->ds_type1, 'plasma_f'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'type2' => [
                    'mean' => $this->mean($this->ds_type2, 'plasma_f'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'normal' => [
                    'mean' => $this->mean($this->ds_normal, 'plasma_f'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'hba1c' => [
                'type1' => [
                    'mean' => $this->mean($this->ds_type1, 'hba1c'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'type2' => [
                    'mean' => $this->mean($this->ds_type2, 'hba1c'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'normal' => [
                    'mean' => $this->mean($this->ds_normal, 'hba1c'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
        ];

        $this->probabilitas = [
            'normal' => count($this->ds_normal) / (count($this->ds_normal)+count($this->ds_type1)+count($this->ds_type2)) ,
            'type1' => count($this->ds_type1) / (count($this->ds_normal)+count($this->ds_type1)+count($this->ds_type2)) ,
            'type2' => count($this->ds_type2) / (count($this->ds_normal)+count($this->ds_type1)+count($this->ds_type2)) 
        ];

        $this->hasil = [
            'normal' => 0,
            'type1' => 0,
            'type2' => 0,
        ];
    }

    public function index()
    {
        $datas = [
            'data' => null,
            'hasil' => null
        ];
        return view('result', $datas);
    }

    public function naiveBayes(Request $req)
    {
        $data = $req->all();
        foreach ($this->naive as $key => $value) {
            $this->naive[$key]['type1']['std_dev'] = $this->std_dev($this->ds_type1, $key, 'type1');
            $this->naive[$key]['type2']['std_dev'] = $this->std_dev($this->ds_type2, $key, 'type2');
            $this->naive[$key]['normal']['std_dev'] = $this->std_dev($this->ds_normal, $key, 'normal');
            
            $this->naive[$key]['type1']['prob'] = $this->prob($data[$key], $this->naive[$key]['type1']['std_dev'], $this->naive[$key]['type1']['mean']);
            $this->naive[$key]['type2']['prob'] = $this->prob($data[$key], $this->naive[$key]['type2']['std_dev'], $this->naive[$key]['type2']['mean']);
            $this->naive[$key]['normal']['prob'] = $this->prob($data[$key], $this->naive[$key]['normal']['std_dev'], $this->naive[$key]['normal']['mean']);
            
            $this->probabilitas['type1'] *= $this->naive[$key]['type1']['prob'];
            $this->probabilitas['type2'] *= $this->naive[$key]['type2']['prob'];
            $this->probabilitas['normal'] *= $this->naive[$key]['normal']['prob'];
        }

        
        $type1 = $this->probabilitas['type1'] / (count($this->ds_type1) / (count($this->ds_normal)+count($this->ds_type1)+count($this->ds_type2)));
        $type2 = $this->probabilitas['type2'] / (count($this->ds_type2) / (count($this->ds_normal)+count($this->ds_type1)+count($this->ds_type2)));
        $normal = $this->probabilitas['normal'] / (count($this->ds_normal) / (count($this->ds_normal)+count($this->ds_type1)+count($this->ds_type2)));

        $this->hasil['type1'] = ($type1 / ($type1 + $type2 + $normal)) * 100;
        $this->hasil['type2'] = ($type2 / ($type1 + $type2 + $normal)) * 100;
        $this->hasil['normal'] = ($normal / ($type1 + $type2 + $normal)) * 100;

        $datas = [
            'data' => $data,
            'hasil' => $this->hasil
        ];

        return view('result', $datas);
        
    } 

    //menghitung mean
    public function mean($data, $key)
    {   //karena menggunakan laplace smoothing maka jumlah di tambah 1 untuk menghindari probabilitas 0

        return (array_sum(array_column($data, $key)) + 1) / (count($data) + 6);
    }

    //menghitung standart deviasi
    public function std_dev($data, $key, $type)
    {

        $temp = array_column($data, $key);
        $mean = $this->naive[$key][$type]['mean'];

        $result = array_map(
            function($val) use($mean) {
                return pow(($val - $mean), 2); 
            }, $temp
        );
        return sqrt(array_sum($result) / (count($data) - 1));
    }

    //menghitung probabilitas
    public function prob($data, $std_dev, $mean)
    {
        $penyebut = sqrt((2*3.14)*$std_dev);
        $e_pembilang = pow(($data-$mean) ,2);
        $e_pemnyebut = 2*(pow($std_dev, 2));

        $result = (1/$penyebut)*exp(-($e_pembilang/$e_pemnyebut));
        return $result;
    } 
}
