<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();

        return view('admin.category.listCategory', compact('categories'));
    }

    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
        } catch (Exception $e) {

            return redirect('trangchu');

        }
        $category->name = $req->Name;
        $category->description = $req->Description;

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $nameImg = str_random(config('img_name_length')) . "_". $name;
            $file->move('storage/img/categories/', $nameImg);
            $category->image = $nameImg;
        }
        else {
            $category->image = "";
        }

        $category->save();

        return redirect('listcategories.edit'. $id)->with('message', trans('home_admin.success'));
    }

    public function update(Request $request, $id)
    {
        $category = new Category;
        $category->name = $req->Name;
        $category->description = $req->Description;

        if ($req->hasFile('Image')) {
            $file = $req->file('Image');
            $name = $file->getClientOriginalName();
            $nameImg = str_random(config('img_name_length')) . "_". $name;
            $file->move('storage/img/categories/', $nameImg);
            $category->image = $nameImg;
        }
        else {
            $category->image = "";
        }
        $category->save();

        return redirect('listcategories')->with('message', trans('home_admin.success'));
    }

    public function destroy($id)
    {
        $category = Category::destroy($id);

        return redirect('listcategories')->with('message', trans('home_admin.success'));
    }
}
