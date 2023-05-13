<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//Unknow
class ProductController extends Controller
{


    public function registrationProduct()
    {
        return view('admin.addproduct');
    }

    public function customProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'color' => 'required',
            'price' => 'required',
            'instock' => 'required',
            'sold' => 'required',
            'type' => 'required',
            'star' => 'required',
            'number_comment' => 'required',
            'photo' => 'required',
        ]);
        $file = $request->file('photo');
        $path = 'uploads';
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);
        $product = new Product($request->all());
        $product->photo = $fileName;
        $product->save();
        return redirect("listproduct");
    }

    public function createProduct(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'color' => $data['color'],
            'price' => $data['price'],
            'instock' => $data['instock'],
            'sold' => $data['sold'],
            'type' => $data['type'],
            'star' => $data['star'],
            'number_comment' => $data['number_comment'],
            'photo' => $data['photo'],
        ]);
    }

    public function getDataEdit($id)
    {
        $getData = DB::table('products')->select('*')->where('id', $id)->get();
        return view('admin.editproduct')->with('getDataProductById', $getData);
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
        return view('admin.listproduct', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.listsearchproduct', compact('products'));
    }
}
