<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function createStudent(Request $request){
        $mahasiswa = Student::create([
            'name' => $request->name,
            'classId' => $request->classId,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa ditambahkan',
            'data' => [
                'mahasiswa' => $mahasiswa
            ]
        ]);
    }

    public function updateStudent(Request $request, $id){
        $mahasiswa = Student::find($id);
        if(!$mahasiswa){
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa tidak ditemukan'
            ], 404);
        }

        $mahasiswa->name = $request->name;
        $mahasiswa->classId = $request->classId;
        $mahasiswa->save();

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa berhasil diperbarui',
            'data' => [
                'mahasiswa' => $mahasiswa
            ]
        ]);
    }

    public function deleteStudent($id){
        $mahasiswa = Student::find($id);
        if(!$mahasiswa){
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa tidak ditemukan'
            ], 404);
        }

        $mahasiswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa berhasil dihapus'
        ]);
    }
    
}
