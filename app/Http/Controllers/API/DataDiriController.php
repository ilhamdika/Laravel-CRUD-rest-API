<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Helpers\ApiFormater;
use Exception;


class DataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataDiri::all();

        if ($data) {
            return ApiFormater::createApi($data, 'Data Ditemukan', 200);
        } else {
            return ApiFormater::createApi(404, 'Data Tidak Ditemukan', null);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'nama' => 'required',
                'adress' => 'required',
            ]);

            $dataDiri = DataDiri::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'adress' => $request->adress,
            ]);

            $data = DataDiri::find($dataDiri->id);

            if ($data) {
                return ApiFormater::createApi($data, 'Data Berhasil Disimpan', 200);
            } else {
                return ApiFormater::createApi(404, 'Data Tidak Ditemukan', null);
            }
        } catch (Exception $e) {
            return ApiFormater::createApi($e->getMessage(), 'Gagal Menyimpan Data', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DataDiri::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormater::createApi($data, 'Data Berhasil Disimpan', 200);
        } else {
            return ApiFormater::createApi(404, 'Data Tidak Ditemukan', null);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'username' => 'required',
                'nama' => 'required',
                'adress' => 'required',
            ]);

            $dataDiri = DataDiri::findOrFail($id);

            $dataDiri->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'adress' => $request->adress,
            ]);

            $data = DataDiri::find($dataDiri->id);

            if ($data) {
                return ApiFormater::createApi($data, 'Data Berhasil Disimpan', 200);
            } else {
                return ApiFormater::createApi(404, 'Data Tidak Ditemukan', null);
            }
        } catch (Exception $e) {
            return ApiFormater::createApi($e->getMessage(), 'Gagal Menyimpan Data', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataDiri::find($id);

        if ($data) {
            $data->delete();
            return ApiFormater::createApi($data, 'Data Berhasil Dihapus', 200);
        } else {
            return ApiFormater::createApi(404, 'Data Tidak Ditemukan', null);
        }
    }

    public function restore($id)
    {
        $data = DataDiri::withTrashed()->where('id', $id)->restore();

        if ($data) {
            return ApiFormater::createApi($data, 'Data Berhasil Dikembalikan', 200);
        } else {
            return ApiFormater::createApi(404, 'Data Tidak Ditemukan', null);
        }
    }
}
