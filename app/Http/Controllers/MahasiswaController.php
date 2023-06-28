<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'umur' => 'required|integer',
            'alamat' => 'required',
            'kota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

        $mahasiswa = Mahasiswa::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan'
        ]);
    }

    public function read()
    {
        $mahasiswa = Mahasiswa::all();

        return response()->json([
            'status' => 'success',
            'data' => $mahasiswa
        ]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=new Mahasiswa();
        $data=$model->all();
        foreach($data as $dt) {
        $balikan[]= [
        'nim'=>$dt->nim,
        'nama'=>$dt->nama,
        'umur'=>$dt->umur,
        'alamat'=>$dt->alamat,
        'kota'=>$dt->kota,
        'kelas'=>$dt->kelas,
        'jurusan'=>$dt->jurusan
        ];
    }
        return response()->json($balikan); }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->umur = $request->umur;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->kota = $request->kota;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();

        return response()->json($mahasiswa);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }
        return response()->json($mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        if (!mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }
        $mahasiswa->nama = $request->nama;
        $mahasiswa->umur = $request->umur;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->kota = $request->kota;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();

        return response()->json($mahasiswa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        if (!mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }
        $mahasiswa->delete();

        return response()->json(['message' => 'Mahasiswa deleted successfully']);
    }
}
