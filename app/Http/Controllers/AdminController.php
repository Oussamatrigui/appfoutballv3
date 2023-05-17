<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dash(){
        $nombreClients = Client::count();
        $nombreUser = User::count();
        $orders = Order::count();

        $journalist = User::where('role', 'journalist')->get();
        
        $admin = User::where('role', 'admin')->get();
        
        return view('admin.dash', ['nombreClients' => $nombreClients,
                                        'orders' => $orders,

                                        'journalists' => $journalist,
                                        'admins' => $admin,
                                        'nombreUser'    =>$nombreUser]);


    }
    

}
