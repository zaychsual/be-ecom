<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Invoice::with('customer')->when(request()->q, function($data) {
            $data = $data->where('invoice', 'like', '%'. request()->q . '%');
        })->latest()->paginate(10);

        //return with Api Resource
        return new InvoiceResource(true, 'List Data Invoices', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Invoice::with('orders.product', 'customer', 'city', 'province')->findOrFail($id)->first();

        if($data) {
            //return success with Api Resource
            return new InvoiceResource(true, 'Detail Data Invoice!', $data);
        }

        //return failed with Api Resource
        return new InvoiceResource(false, 'Detail Data Invoice Tidak Ditemukan!', null);
    }
}
