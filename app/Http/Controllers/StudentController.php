<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $data = [
            'message' => 'Dapatkan Semua Siswa',
            'data' => $students,
        ];
        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'prodi' => $request->prodi,
        ];

        $student = Student::create($input);
        $data = [
            'message' => 'Berhasil Dibuat',
            'data' => $student,
        ];
        return response()->json($data, 201);
    }
    public function update($iid, Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'prodi' => $request->prodi,
        ];

        Student::find($id)->update($input);
        $student = Student::find($id);
        $data = [
            'message' => 'Data Siswa Berhasil Diperbaharui',
            'data' => $student,
        ];
        return response()->json($data, 201);
    }

    public function destroy($id)
    {
        $student = Student::FindOrFail($id);
        if($student->delete()){
            return response([
                'Berhasil Menghapus Data Siswa'
            ]);
        }else{
            return response([
                'Tidak Berhasil Menghapus Data'
            ]);
        }
    }
}