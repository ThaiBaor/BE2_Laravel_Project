<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addCategory()
    {
        return view('admin.content.addcategory');
    }   
    public function customCategory(Request $request)
    {
        $request->validate([
            'cate_name' => 'required',
        ]);
        $category = new Category($request->all());
        $category->save();
        return redirect("listcategory");
    }

    public function listCategory()
    {
        $categories = DB::table('categories')->paginate(4);
        return view('admin.content.listcategory', compact('categories'));
    }

    public function createCategory(array $data)
    {
        return Category::create([
            'cate_name' => $data['cate_name'],
        ]);
    }
    
    public function getDataEditCategory($id)
    {
        $getData = DB::table('categories')->select('*')->where('id', $id)->get();
        return view('admin.content.editcategory')->with('getDataCategoryById', $getData);
    }
     public function updateCategory(Request $request)
    { 
        $updateData = DB::table('categories')->where('id', $request->id)->update([
            'cate_name' => $request->cate_name,
            'reduce' => $request->reduce,
        ]);
        return redirect('listcategory');
    }


    public function deleteCategory($id)
    {
        $deleteData = DB::table('categories')->where('id', '=', $id)->delete();
        return redirect('listcategory');
    }


    public function searchVoucher(Request $request)
    {
        $keyword = $request->keyword;
        $vouchers = Voucher::where('mavoucher', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.content.listsearchvoucher', compact('vouchers'));
    }
}
