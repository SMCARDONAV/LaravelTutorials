<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        $email = 'contact@onlinestore.com';
        $address = '123 Business Rd, Medellin, CO 80022';
        $phone = '604 123-4567';

        return view('home.contact')
            ->with('email', $email)
            ->with('address', $address)
            ->with('phone', $phone);
    }
}
