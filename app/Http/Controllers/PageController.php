<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('home');
    }

    public function showContact() {
        return view('pages.contact');
    }

    public function indexProduct() {
        return view('pages.products');
    }

    public function productDetail() {
        return view('pages.productDetail');
    }

    public function indexWishlist() {
        return view('pages.indexWishlist');
    }

    public function indexCart() {
        return view('pages.showCart');
    }

    public function indexCheckout() {
        return view('pages.checkout');
    }
}
