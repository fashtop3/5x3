<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teller');
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'receipt' => 'required|image|max:2048',
        ]);

        try {

            $receipt = auth()->user()->receipt()->first();

            if ($request->hasFile('receipt')) {
                if ($request->file('receipt')->isValid()) {
                    $filename = $request->receipt->store('receipt');
                    if (!is_null($receipt)) {
                        @unlink(storage_path() . '/app/' . $receipt->upload);

                        $receipt->update(['upload' => $filename]);
                    } else {
                        auth()->user()->receipt()->create(['upload' => $filename]);
                    }

                    Session::flash('r-upload', "Receipt uploaded");
                }
            }
        } catch (\Exception $e) {
            Session::flash('error', "Error: Request Failed");
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
