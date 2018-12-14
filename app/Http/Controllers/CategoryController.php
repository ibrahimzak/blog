<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $categories) {
        $categories = $categories->all();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create() {
        return view('dashboard.categories.create');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
        ]);
        $cat = new Category(request(['name']));
        $cat->save();
        return redirect('/categories');
    }

    public function edit(Category $category) {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function save(Category $category) {
        $this->validate(request(), [
            'name' => 'required'
        ]);
        $data = request()->all();
        $category->name = $data['name'];

        $category->save();
        return redirect('/categories');
    }

    public function delete(Category $category) {
        $category = $category->delete();
    }
}
