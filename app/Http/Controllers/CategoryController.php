<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'));
    }


    
    public function create()
    {
        return view('category/create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name'     => 'required',
            'parent_category'   => 'required'
        ]);

        $category = Category::create([
            'category_name'     => $request->category_name,
            'parent_category'   => $request->parent_category
        ]);

        if($category){
            //redirect dengan pesan sukses
            return redirect('category')->with(['success' => 'Data Has been Created!']);
        }else{
            //redirect dengan pesan error
            return redirect('category')->with(['error' => 'Data Has cant be Create! Fill with correct answer']);
        }
    }
    public function edit(Category $category)
    {
        return view('category/edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'category_name'     => 'required',
        'parent_category'   => 'required'
        ]);

        //get data Blog by ID
        $category = Category::findOrFail($id);


        $category->update([
        'category_name'     => $request->category_name,
        'parent_category'   => $request->parent_category
        ]);

        if($category){
        //redirect dengan pesan sukses
        return redirect('category')->with(['success' => 'Data has been updated']);
        }else{
        //redirect dengan pesan error
        return redirect('category')->with(['error' => 'Data fail update']);
        }
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if($category){
            //redirect dengan pesan sukses
            return redirect('category')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect('category')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}
