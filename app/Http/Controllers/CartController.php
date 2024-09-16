<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product,Order};

class CartController extends Controller
{
    public function add(Product $product)
    {
        if ($product->quantity > 0) {
            $cart = session()->get('cart', []);

            $itemExists = false;

            foreach ($cart as &$item) {
                if ($item['id'] === $product->id) {
                    $item['quantity'] += (int)$_POST['quantity'];
                    $itemExists = true;
                    break;
                }
            }

            unset($item);

            if (!$itemExists) {
                $cart[$product->id] = ['id' => $product->id, 'quantity' => (int)$_POST['quantity']];
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Товар добавлен в корзину!');
        }
        return redirect()->back()->with('error', 'Товар не в наличии!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        $quantities = [];
        foreach ($cart as $item) {
            $quantities[$item['id']] = $item['quantity'];
        }
        foreach ($products as $product) {
            $product->selectedQuantity = $quantities[$product->id] ?? 0;
        }
        return view('cart.index', compact('products'));
    }

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $cart = session()->get('cart', []);

        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->products = json_encode(session()->get('cart', []));
        $order->save();

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if ($product) {
                $product->quantity -= $item['quantity'];
                $product->save();
            }
        }

        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'Заказ оформлен!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
