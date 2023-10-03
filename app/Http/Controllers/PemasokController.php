<?php

namespace App\Http\Controllers;

use App\Models\pemasok;
use App\Http\Requests\StorepemasokRequest;
use App\Http\Requests\UpdatepemasokRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Support\Facades\DB;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try {
        $data['pemasok'] = Pemasok::get();
        return view('pemasok.index')->with($data);
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
     * @param  \App\Http\Requests\StorepemasokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepemasokRequest $request)
    {
        pemasok::create($request->all());
        return redirect('pemasok')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(pemasok $pemasok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepemasokRequest  $request
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepemasokRequest $request, pemasok $pemasok)
    {
        $pemasok->update($request->all());

        return redirect('pemasok')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(pemasok $pemasok)
    {
        try {
            DB::beginTransaction();
            $pemasok->delete();
            DB::commit();
            return redirect('pemasok')->with('success', 'Data produk berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan " . $error->getMessage();
        }
    }
}
