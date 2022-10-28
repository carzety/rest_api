<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animal = [
        ['id' => 1, 'nama' => 'Cat'],
        ['id' => 1, 'nama' => 'Dog'],
        ['id' => 1, 'nama' => 'Fish'],
        ['id' => 1, 'nama' => 'Chicken']
    ];

    public function index()
    {
        foreach ($this->animal as $animal) {
            echo $animal['id'] .'.'. $animal['nama'] . '<br>';
        }
    }
    public function store(Request $request)
    {
        array_push($this->animal, ['id' => 5, 'nama' => $request->nama]);
        $this->index();
    }
    public function update(Request $request, $id)
    {
        array_splice($this->animal, $id - 1, 1, [['id' => $id, 'nama' => $request->nama]]);
        $this->index();
    }
    public function destroy($id){
        unset($this->animal[$id - 1]);
        $this->index();
    }
}
?>