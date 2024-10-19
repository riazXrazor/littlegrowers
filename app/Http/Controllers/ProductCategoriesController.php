<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories',['categories' => $categories]);
    }

    public function add()
    {
        if (request()->isMethod('post')) {
            request()->validate([
                'category_name' => 'required',
            ]);
            $category = new Categories();
            $category->category_name = request('category_name');
            $category->save();
            return redirect('/admin/categories');
        }
        return view('admin.add-category');
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        if (request()->isMethod('post')) {
            request()->validate([
                'category_name' => 'required',
            ]);
            $category->category_name = request('category_name');
            $category->save();
            return redirect('/admin/categories');
        }

        return view('admin.edit-category', ['category' => $category]);
    }

    public function delete($id)
    {
        if($id){
            $category = Categories::find($id);
            $category->delete();
        }
        return redirect('/admin/categories');
    }

   
}
