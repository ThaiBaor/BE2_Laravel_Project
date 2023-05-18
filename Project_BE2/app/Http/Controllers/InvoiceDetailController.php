<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Invoice_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceDetailController extends Controller
{
    
    public function addInvoice()
    {
        return view('admin.content.addinvoice');
    }

    public function customInvoice(Request $request)
    {
        $request->validate([
            'id_product' => 'required',
            'id_invoice' => 'required',
            'quantity' => 'required',
            'total_money' => 'required',
        ]);
        $invoice_detail = new Invoice_detail($request->all());
        $invoice_detail->save();
        return redirect("listinvoice");
    }

    public function createInvoice(array $data)
    {
        return Invoice::create([
            'id_product' => $data['id_product'],
            'id_invoice' => $data['id_invoice'],
            'quantity' => $data['quantity'],
            'total_money' => $data['total_money'],
        ]);
    }

    public function getDataEditInvoice($id)
    {
        $getData = DB::table('invoice_details')->select('*')->where('id', $id)->get();
        return view('admin.content.editinvoice')->with('getDataInvoiceById', $getData);
    }

    public function updateInvoice(Request $request)
    { 
        $updateData = DB::table('invoice_details')->where('id', $request->id)->update([
            'id_product' => $request->id_product,
            'id_invoice' => $request->id_invoice,
            'quantity' => $request->quantity,
            'total_money' => $request->total_money,
        ]);
        return redirect('listinvoice');
    }


    public function deleteInvoice($id)
    {
        $deleteData = DB::table('invoice_details')->where('id', '=', $id)->delete();
        return redirect('listinvoice');
    }


    public function listInvoice()
    {
        $invoices = DB::table('invoice_details')->paginate(4);
        return view('admin.content.listinvoice', compact('invoices'));
    }

    public function searchInvoice(Request $request)
    {
        $keyword = $request->keyword;
        $invoices = Invoice_detail::where('id_invoice', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.content.listsearchinvoice', compact('invoices'));
    }
}
