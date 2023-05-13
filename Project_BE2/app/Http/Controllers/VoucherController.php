<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//Unknow
class VoucherController extends Controller
{


    public function addVoucher()
    {
        return view('admin.content.addvoucher');
    }

    public function customVoucher(Request $request)
    {
        $request->validate([
            'mavoucher' => 'required',
            'createddate' => 'required',
            'expireddate' => 'required',
        ]);
        $createdDate = $request->createddate;
        $newCreatedDate = date("Y-m-d", strtotime($createdDate));
        $expiredDate = $request->expireddate;
        $newExpiredDate = date("Y-m-d", strtotime($expiredDate));
        $voucher = new Voucher($request->all());
        $voucher->createddate = $newCreatedDate;
        $voucher->expireddate = $newExpiredDate;
        $voucher->save();
        return redirect("listproduct");
    }

    public function createVoucher(array $data)
    {
        return Product::create([
            'mavoucher' => $data['mavoucher'],
            'createddate' => $data['createddate'],
            'expireddate' => $data['expireddate'],
        ]);
    }

    public function getDataEdit($id)
    {
        $getData = DB::table('products')->select('*')->where('id', $id)->get();
        return view('admin.content.editproduct')->with('getDataProductById', $getData);
    }

    public function updateProduct(Request $request)
    {
        $file = $request->file('photo');
        $path = 'uploads';
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);

        $updateData = DB::table('products')->where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'color' => $request->color,
            'price' => $request->price,
            'instock' => $request->instock,
            'sold' => $request->sold,
            'type' => $request->type,
            'star' => $request->star,
            'number_comment' => $request->number_comment,
            'photo' => $fileName,
        ]);
        //Thực hiện chuyển trang
        return redirect('listproduct');
    }


    public function deleteProduct($id)
    {
        $deleteData = DB::table('products')->where('id', '=', $id)->delete();
        return redirect('listproduct');
    }


    public function listProduct()
    {
        $products = DB::table('products')->paginate(4);
        return view('admin.content.listproduct', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.content.listsearchproduct', compact('products'));
    }
}
