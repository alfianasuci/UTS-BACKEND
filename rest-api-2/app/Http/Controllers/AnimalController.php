<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["Sapi", "Ikan", "Gajah"];
    public function index()
    {
        echo "Menampilkan data animal adalah ";
        foreach ($this->animals as $animal){
            echo $animal . "," ;
        }
    }
    
    public function store(Request $request)
    {
        echo "Menambahkan animal baru ";
        $data = $request->only('animal');
        array_push($this->animals, $data["animal"]);
        $this->index();
        
    }

    public function update(Request $request, $id)
    {
        echo "Mengupdate data animal index ke " . $id . ",";
        $data = $request->only('animal');
        $this->animals[$id] = $data["animals"];
        $this->index();
        
    }

    public function destroy($id)
    {
        echo "Menghapus data animal index ke " . $id . ".";
        unset($this->animals[$id]);
        $this->index();
    }
}

