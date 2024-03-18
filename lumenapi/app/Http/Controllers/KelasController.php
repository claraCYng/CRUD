<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
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
    public function createKelas(Request $request){
        $kelas = Kelas::create([
            'nameClass' => $request->nameClass,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Kelas ditambahkan',
            'data' => [
                'kelas' => $kelas
            ]
        ]);
    }
    public function getKelasById(Request $request){
        $kelas = Kelas::find($request->id);
        if(!$kelas){
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data kelas ditampilkan',
            'data' => [
                'kelas' => [
                    'id' => $kelas->id,
                    'nameClass' => $kelas->nameClass,
                    'students' => $kelas->students,
                ]
            ]
        ]);
    }

    public function updateKelas(Request $request, $id){
        $kelas = Kelas::find($id);
        if(!$kelas){
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan'
            ], 404);
        }

        $kelas->nameClass = $request->nameClass;
        $kelas->save();

        return response()->json([
            'success' => true,
            'message' => 'Kelas berhasil diperbarui',
            'data' => [
                'kelas' => $kelas
            ]
        ]);
    }

    // Delete a class
    public function deleteKelas($id){
        $kelas = Kelas::find($id);
        if(!$kelas){
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan'
            ], 404);
        }

        $kelas->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kelas berhasil dihapus'
        ]);
    }
}
