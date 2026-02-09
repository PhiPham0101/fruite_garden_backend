<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\CartModelItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // GET /api/cart
    public function index(Request $request)
    {
        $user = $request->user();

        $cart = CartModel::with('items.product')
            ->where('user_id', $user->id)
            ->first();

        if (!$cart) {
            return response()->json([
                'products' => [],
                'totalQuantity' => 0,
                'totalPrice' => 0,
            ]);
        }

        $totalQuantity = 0;
        $totalPrice = 0;

        foreach ($cart->items as $item) {
            $totalQuantity += $item->quantity;
            $totalPrice += $item->quantity * $item->price;
        }

        return response()->json([
            'products' => $cart->items->map(fn ($item) => [
                'product' => $item->product,
                'quantity' => $item->quantity,
            ]),
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
        ]);
    }

    // POST /api/cart/sync
    public function sync(Request $request)
{
    $user = $request->user();

    $request->validate([
        // 'products' => 'required|array',
        'products' => 'nullable|array',
        'products.*.product_id' => 'required|integer',
        'products.*.quantity' => 'required|integer|min:1',
    ]);

    $cart = CartModel::firstOrCreate([
        'user_id' => $user->id
    ]);

    // Nếu không có sản phẩm → clear cart
    if (empty($request->products)) {
        CartModelItem::where('cart_id', $cart->id)->delete();

        return response()->json([
            'message' => 'Cart cleared'
        ]);
    }

    // Reset cart_items trước khi sync
    CartModelItem::where('cart_id', $cart->id)->delete();

    foreach ($request->products as $item) {
        $product = Product::findOrFail($item['product_id']);

        CartModelItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => $item['quantity'],
            'price' => $product->price,
        ]);
    }

    return response()->json(['message' => 'Cart synced']);
}


    // public function sync(Request $request)
    // {
    //     $user = $request->user();

    //     $cart = CartModel::firstOrCreate([
    //         'user_id' => $user->id
    //     ]);

    //     foreach ($request->products as $item) {
    //         $cartItem = CartModelItem::firstOrNew([
    //             'cart_id' => $cart->id,
    //             'product_id' => $item['product_id'],
    //         ]);

    //         $cartItem->quantity = ($cartItem->quantity ?? 0) + $item['quantity'];
    //         $cartItem->price = Product::find($item['product_id'])->price;
    //         $cartItem->save();
    //     }

    //     return response()->json(['message' => 'Synced']);
    // }
}
