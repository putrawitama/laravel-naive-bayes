<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diabete;

class NaiveCoreController extends Controller
{
    public function __construct() {
        //get dataset
        $this->type = [
            'normal' => Diabete::where('type', 'Normal')->count(),
            'type1' => Diabete::where('type', 'Type1')->count(),
            'type2' => Diabete::where('type', 'Type2')->count(),
        ];

        $this->dataset = [
            'age' => [
                'A2' => [
                    'normal' => Diabete::where('age', 'A2')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('age', 'A2')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('age', 'A2')->where('type', 'Type2')->count() + 1,
                ],
                'A3' => [
                    'normal' => Diabete::where('age', 'A3')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('age', 'A3')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('age', 'A3')->where('type', 'Type2')->count() + 1,
                ],
                'A4' => [
                    'normal' => Diabete::where('age', 'A4')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('age', 'A4')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('age', 'A4')->where('type', 'Type2')->count() + 1,
                ],
                'A5' => [
                    'normal' => Diabete::where('age', 'A5')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('age', 'A5')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('age', 'A5')->where('type', 'Type2')->count() + 1,
                ],
                'A6' => [
                    'normal' => Diabete::where('age', 'A6')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('age', 'A6')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('age', 'A6')->where('type', 'Type2')->count() + 1,
                ],
            ],
            'bsfast' => [
                'BSF2' => [
                    'normal' => Diabete::where('bsfast', 'BSF2')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bsfast', 'BSF2')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bsfast', 'BSF2')->where('type', 'Type2')->count() + 1,
                ],
                'BSF3' => [
                    'normal' => Diabete::where('bsfast', 'BSF3')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bsfast', 'BSF3')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bsfast', 'BSF3')->where('type', 'Type2')->count() + 1,
                ],
                'BSF4' => [
                    'normal' => Diabete::where('bsfast', 'BSF4')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bsfast', 'BSF4')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bsfast', 'BSF4')->where('type', 'Type2')->count() + 1,
                ],
                'BSF5' => [
                    'normal' => Diabete::where('bsfast', 'BSF5')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bsfast', 'BSF5')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bsfast', 'BSF5')->where('type', 'Type2')->count() + 1,
                ],
                'BSF6' => [
                    'normal' => Diabete::where('bsfast', 'BSF5')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bsfast', 'BSF5')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bsfast', 'BSF5')->where('type', 'Type2')->count() + 1,
                ],
            ],
            'bspp' => [
                'BSP2' => [
                    'normal' => Diabete::where('bspp', 'BSP2')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bspp', 'BSP2')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bspp', 'BSP2')->where('type', 'Type2')->count() + 1,
                ],
                'BSP3' => [
                    'normal' => Diabete::where('bspp', 'BSP3')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bspp', 'BSP3')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bspp', 'BSP3')->where('type', 'Type2')->count() + 1,
                ],
                'BSP4' => [
                    'normal' => Diabete::where('bspp', 'BSP4')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bspp', 'BSP4')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bspp', 'BSP4')->where('type', 'Type2')->count() + 1,
                ],
                'BSP5' => [
                    'normal' => Diabete::where('bspp', 'BSP5')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bspp', 'BSP5')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bspp', 'BSP5')->where('type', 'Type2')->count() + 1,
                ],
                'BSP6' => [
                    'normal' => Diabete::where('bspp', 'BSP6')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('bspp', 'BSP6')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('bspp', 'BSP6')->where('type', 'Type2')->count() + 1,
                ],
            ],
            'plasma_r' => [
                'PR2' => [
                    'normal' => Diabete::where('plasma_r', 'PR2')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_r', 'PR2')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_r', 'PR2')->where('type', 'Type2')->count() + 1,
                ],
                'PR3' => [
                    'normal' => Diabete::where('plasma_r', 'PR3')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_r', 'PR3')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_r', 'PR3')->where('type', 'Type2')->count() + 1,
                ],
                'PR4' => [
                    'normal' => Diabete::where('plasma_r', 'PR4')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_r', 'PR4')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_r', 'PR4')->where('type', 'Type2')->count() + 1,
                ],
                'PR5' => [
                    'normal' => Diabete::where('plasma_r', 'PR5')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_r', 'PR5')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_r', 'PR5')->where('type', 'Type2')->count() + 1,
                ],
                'PR6' => [
                    'normal' => Diabete::where('plasma_r', 'PR6')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_r', 'PR6')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_r', 'PR6')->where('type', 'Type2')->count() + 1,
                ],
            ],
            'plasma_f' => [
                'PF2' => [
                    'normal' => Diabete::where('plasma_f', 'PF2')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_f', 'PF2')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_f', 'PF2')->where('type', 'Type2')->count() + 1,
                ],
                'PF3' => [
                    'normal' => Diabete::where('plasma_f', 'PF3')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_f', 'PF3')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_f', 'PF3')->where('type', 'Type2')->count() + 1,
                ],
                'PF4' => [
                    'normal' => Diabete::where('plasma_f', 'PF4')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_f', 'PF4')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_f', 'PF4')->where('type', 'Type2')->count() + 1,
                ],
                'PF5' => [
                    'normal' => Diabete::where('plasma_f', 'PF5')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_f', 'PF5')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_f', 'PF5')->where('type', 'Type2')->count() + 1,
                ],
                'PF6' => [
                    'normal' => Diabete::where('plasma_f', 'PF6')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('plasma_f', 'PF6')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('plasma_f', 'PF6')->where('type', 'Type2')->count() + 1,
                ],
            ],
            'hba1c' => [
                'HB2' => [
                    'normal' => Diabete::where('hba1c', 'HB2')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('hba1c', 'HB2')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('hba1c', 'HB2')->where('type', 'Type2')->count() + 1,
                ],
                'HB3' => [
                    'normal' => Diabete::where('hba1c', 'HB3')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('hba1c', 'HB3')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('hba1c', 'HB3')->where('type', 'Type2')->count() + 1,
                ],
                'HB4' => [
                    'normal' => Diabete::where('hba1c', 'HB4')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('hba1c', 'HB4')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('hba1c', 'HB4')->where('type', 'Type2')->count() + 1,
                ],
                'HB5' => [
                    'normal' => Diabete::where('hba1c', 'HB5')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('hba1c', 'HB5')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('hba1c', 'HB5')->where('type', 'Type2')->count() + 1,
                ],
                'HB6' => [
                    'normal' => Diabete::where('hba1c', 'HB6')->where('type', 'Normal')->count() + 1,
                    'type1' => Diabete::where('hba1c', 'HB6')->where('type', 'Type1')->count() + 1,
                    'type2' => Diabete::where('hba1c', 'HB6')->where('type', 'Type2')->count() + 1,
                ],
            ]
            ];

        $this->probabilitas = [];

        $this->probabilitasType = [];

        $this->totalType = 0;

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
        $datas = [];
        switch (true) {
            case ($data['age'] <= 28):
                $datas['age'] = 'A2';
                break;
            case (28 < $data['age'] && $data['age'] <= 27):
                $datas['age'] = 'A3';
                break;
            case (37 < $data['age'] && $data['age'] <= 46):
                $datas['age'] = 'A4';
                break;
            case (46 < $data['age'] && $data['age'] <= 55):
                $datas['age'] = 'A5';
                break;
            case (55 < $data['age']):
                $datas['age'] = 'A6';
                break;
            
            default:
                $datas['age'] = 'A2';
                break;
        }
        switch (true) {
            case ($data['bsfast'] <= 5.2):
                $datas['bsfast'] = 'BSF2';
                break;
            case (5.2 < $data['bsfast'] && $data['bsfast'] <= 5.7):
                $datas['bsfast'] = 'BSF3';
                break;
            case (5.8 < $data['bsfast'] && $data['bsfast'] <= 6.2):
                $datas['bsfast'] = 'BSF4';
                break;
            case (6.2 < $data['bsfast'] && $data['bsfast'] <= 6.7):
                $datas['bsfast'] = 'BSF5';
                break;
            case (6.7 < $data['bsfast']):
                $datas['bsfast'] = 'BSF6';
                break;
            
            default:
                $datas['bsfast'] = 'BSF2';
                break;
        }
        switch (true) {
            case ($data['bspp'] <= 5.2):
                $datas['bspp'] = 'BSP2';
                break;
            case (5.2 < $data['bspp'] && $data['bspp'] <= 6.2):
                $datas['bspp'] = 'BSP3';
                break;
            case (6.2 < $data['bspp'] && $data['bspp'] <= 7.2):
                $datas['bspp'] = 'BSP4';
                break;
            case (7.2 < $data['bspp'] && $data['bspp'] <= 8.2):
                $datas['bspp'] = 'BSP5';
                break;
            case (8.2 < $data['bspp']):
                $datas['bspp'] = 'BSP6';
                break;
            
            default:
                $datas['bspp'] = 'BSF2';
                break;
        }
        switch (true) {
            case ($data['plasma_r'] <= 8.9):
                $datas['plasma_r'] = 'PR2';
                break;
            case (8.9 < $data['plasma_r'] && $data['plasma_r'] <= 10.0):
                $datas['plasma_r'] = 'PR3';
                break;
            case (10.0 < $data['plasma_r'] && $data['plasma_r'] <= 11.1):
                $datas['plasma_r'] = 'PR4';
                break;
            case (11.1 < $data['plasma_r'] && $data['plasma_r'] <= 12.2):
                $datas['plasma_r'] = 'PR5';
                break;
            case (12.2 < $data['plasma_r']):
                $datas['plasma_r'] = 'PR6';
                break;
            
            default:
                $datas['plasma_r'] = 'PR2';
                break;
        }
        switch (true) {
            case ($data['plasma_f'] <= 4.9):
                $datas['plasma_f'] = 'PF2';
                break;
            case (4.9 < $data['plasma_f'] && $data['plasma_f'] <= 6.0):
                $datas['plasma_f'] = 'PF3';
                break;
            case (6.0 < $data['plasma_f'] && $data['plasma_f'] <= 7.1):
                $datas['plasma_f'] = 'PF4';
                break;
            case (7.1 < $data['plasma_f'] && $data['plasma_f'] <= 8.2):
                $datas['plasma_f'] = 'PF5';
                break;
            case (8.2 < $data['plasma_f']):
                $datas['plasma_f'] = 'PF6';
                break;
            
            default:
                $datas['plasma_f'] = 'PF2';
                break;
        }
        switch (true) {
            case ($data['hba1c'] <= 36):
                $datas['hba1c'] = 'HB2';
                break;
            case (36 < $data['hba1c'] && $data['hba1c'] <= 45):
                $datas['hba1c'] = 'HB3';
                break;
            case (45 < $data['hba1c'] && $data['hba1c'] <= 54):
                $datas['hba1c'] = 'HB4';
                break;
            case (54 < $data['hba1c'] && $data['hba1c'] <= 63):
                $datas['hba1c'] = 'HB5';
                break;
            case (63 < $data['hba1c']):
                $datas['hba1c'] = 'HB6';
                break;
            
            default:
                $datas['hba1c'] = 'HB2';
                break;
        }


        $this->prob();

        $hasil = [
            'normal' => $this->probabilitas['age'][$datas['age']]['normal'] * $this->probabilitas['bsfast'][$datas['bsfast']]['normal'] * $this->probabilitas['bspp'][$datas['bspp']]['normal'] * $this->probabilitas['plasma_r'][$datas['plasma_r']]['normal'] * $this->probabilitas['plasma_f'][$datas['plasma_f']]['normal'] * $this->probabilitas['hba1c'][$datas['hba1c']]['normal'],
            'type1' => $this->probabilitas['age'][$datas['age']]['type1'] * $this->probabilitas['bsfast'][$datas['bsfast']]['type1'] * $this->probabilitas['bspp'][$datas['bspp']]['type1'] * $this->probabilitas['plasma_r'][$datas['plasma_r']]['type1'] * $this->probabilitas['plasma_f'][$datas['plasma_f']]['type1'] * $this->probabilitas['hba1c'][$datas['hba1c']]['type1'],
            'type2' => $this->probabilitas['age'][$datas['age']]['type2'] * $this->probabilitas['bsfast'][$datas['bsfast']]['type2'] * $this->probabilitas['bspp'][$datas['bspp']]['type2'] * $this->probabilitas['plasma_r'][$datas['plasma_r']]['type2'] * $this->probabilitas['plasma_f'][$datas['plasma_f']]['type2'] * $this->probabilitas['hba1c'][$datas['hba1c']]['type2'],
        ];

        $totalHasil = 0;
        foreach ($hasil as $key => $value) {
            $this->hasil[$key] = ($value * $this->probabilitasType[$key]);
            $totalHasil += $this->hasil[$key];
        }

        $hasilMateng = [];
        foreach ($this->hasil as $key => $value) {
            $hasilMateng[$key] = ($value / $totalHasil) * 100;
        }

        
        $datas = [
            'datas' => $datas,
            'data' => $data,
            'hasilBefore' => $hasil,
            'hasilMentah' => $this->hasil,
            'hasil' => $hasilMateng,
            'type' => $this->type,
            'dataset' => $this->dataset,
            'probabilitas' => $this->probabilitas,
            'probabilitasType' => $this->probabilitasType,
            'totalType' => $this->totalType
        ];

        return view('result', $datas);
        
    } 

    //menghitung probabilitas
    public function prob()
    {
        $totalType = $this->type['normal'] + $this->type['type1'] + $this->type['type2'];
        $this->totalType = $totalType;
        foreach ($this->type as $key => $value) {
            $this->probabilitasType[$key] = $value / $totalType;
        }

        foreach ($this->dataset as $indexDataset => $variable) {
            foreach ($variable as $indexVariable => $type) {
                foreach ($type as $indexType => $value) {
                    $this->probabilitas[$indexDataset][$indexVariable][$indexType] = $value / ($this->type[$indexType]+3);
                }
            }
        }

        // dd($this->probabilitas);
    } 
}
