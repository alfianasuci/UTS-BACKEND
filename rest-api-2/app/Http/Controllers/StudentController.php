<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    # method index - get all resource
    public function index()
    {
        # menggunakan model student untuk slect data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];

        # menggunakan response json laravel
        # otomatis set header content type json
        # otomatis mengubah data array ke json
        #mengatur status code
        return response()-> json($data,200);
    }
    // menambahkan resource student
    // method metthod store
    public function store(Request $request)
    {
        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan student untuk insert data
        $students = Student::create($input);

        $data = [
            'message' => 'Data student berhasil dibuat',
            'data' => $student, 
        ];

        // mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    // mendapatkan detail resource student
    // membuat method show
    public function show($id)
    {
        // cari data student
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student,
            ];

            // mengembalikan data json status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            // mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }

    //  mengupdate resource student
    // membuat method update
    public function update(Request $request, $id)
    {
        // cari data student yg ingin update
        $student = Student::find($id);

        if ($student) {
            // mendaptkan data request
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan,
            ];

            // mengupdate data
            $student->update($input);

            $data = [
                'message' => 'Resource student updated',
                'data' => $student,
            ];

            // mengirimkan respon json dgn status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            // mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        // cari data student yg ingin dihapus
        $student = Student::find($id);

        if ($student){
            // hapus data student
            $student->delete();

            $data = [
                'message' => 'Student is deleted',
            ];

            // mengembalikan data json status code 200
            return response()->json($data, 200);
        }else {
            $data = [
                'message' => 'Student not found',
            ];

            // mengembalikan data json status code 400
            return response()->json($data, 404);
        }
    }
}