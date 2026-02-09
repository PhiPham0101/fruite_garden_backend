<?php

namespace App\Http\Controllers;

use App\Http\Services\Order\OrderService;
use App\Models\CartModel;
use App\Models\CartModelItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $orderService;

    public function __construct(OrderService $orderService){
        $this->orderService = $orderService;
    }
    
    public function index()
    {
        
        return view('admin.order.list', [
            'title' => 'Danh sách đơn hàng',
            'orders' => $this->orderService->get(),
        ]);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();

        try {

            $request->validate([
            'fullName' => 'required|string',
            'address'  => 'required|string',
            'phone'    => 'required|string',
            'email'  => 'required|string',
            'note'    => 'required|string',
            'products' => 'required|array|min:1',
            'products.*.productId' => 'required|integer',
            'products.*.quantity'  => 'required|integer|min:1',
        ]);

            $order = Order::create([
                'fullName' => $request->fullName,
                'address'  => $request->address,
                'phone'    => $request->phone,
                'email'    => $request->email,
                'note'     => $request->note,
                'status'   => 'ORDERED',
            ]);

            foreach ($request->products as $product) {
                $productModel = Product::findOrFail($product['productId']);

                $order->details()->create([
                    'product_id'  => $productModel->id,
                    'price'       => $productModel->price,
                    'quantity'    => $product['quantity'],
                    'total_price' => $productModel->price * $product['quantity'],
                ]);
            }

            //Clear cart sau khi order

            if (auth()->check()) {
                $cart = CartModel::where('user_id', auth()->id())->first();
                if ($cart) {
                    CartModelItem::where('cart_id', $cart->id)->delete();
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'Create order success',
                'data' => $order->load('details.product')
            ], 201);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Order failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('details.product');

        return view('admin.order.listdetail', [
            'title' => 'Chi tiết đơn đặt hàng: ' . $order->id,
            'order' => $order,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:ORDERED,CONFIRMED,SHIPPING,COMPLETED,CANCELLED',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công');
    }


}
