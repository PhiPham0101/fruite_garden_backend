<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateFormRequest;
use App\Http\Services\Category\CategoryService;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        return view('admin.category.list', [
            'title' => 'Danh sách nhóm sản phẩm',
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add', [
            'title' => 'Thêm nhóm sản phẩm',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->categoryService->create($request->only('name'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryModel $category)
    {
        return view('admin.category.edit', [
            'title' => 'Chỉnh sửa nhóm sản phẩm: ' . $category->name,
            'category' => $category,
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryModel $category, CreateFormRequest $request){
        $this->categoryService->update($request, $category);

        return redirect('/admin/category/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request){
        $result = $this->categoryService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa nhóm sản phẩm thành công',
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa thất bại, vui lòng thử lại',
        ], 400);
    }


}
