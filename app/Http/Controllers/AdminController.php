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

    public function client_registration(){
        $client = Client::All();

        return view('admin.client_registration')->with('client', $client);
    }

    public function edit_profile_client($id){
        $client = Client::find($id);
    return view ('admin.edit_profile_client')->with('client', $client);
    }

    public function update_profile_client(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required', 
            'email' => [
                'required',
                'email',
                Rule::unique(Client::class),
            ],
            // 'password' => 'required'
            
        ]);
        $hashedPassword = Hash::make('password');
        $client = Client::find($request->input('id'));
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = $hashedPassword;
        $client->update();
    
        return redirect('client_registration')->with('status', 'Mise à jour avec succès');
    }

    public function admin_liste(){
        $admin = User::All();
        return view('admin.admin_liste')->with('admin', $admin);
    }

    

    public function edit_profile_admin($id){
        $admin = User::find($id);
    return view ('admin.edit_profile_admin')->with('admin', $admin);
}

public function delete_user($id){
    $user = User::find($id);
    $user->delete();
    return back()->with('status', 'l utilisateur a été supprimé avec succès');
}
public function delete_client($id){
    $client = Client::find($id);
    $client->delete();
    return back()->with('status', 'Le Client a été supprimé avec succès');
}

    public function confirmJournalist(Request $request, $id)
    {
        $journalist = User::findOrFail($id);

        $journalist->update(['is_confirmed' => true]);

        return back()->with('status', 'Le compte du journaliste a été confirmé avec succès.');
    }

    public function update_profile_admin(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required', 
            'email' => [
                'required',
                'email',
                Rule::unique(User::class),
            ],
            // 'password' => 'required'
            
        ]);
        $hashedPassword = Hash::make('password');
        $client = User::find($request->input('id'));
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = $hashedPassword;
        $client->update();
    
        return redirect('admin_liste')->with('status', 'Mise à jour avec succès');
    }


    

    public function desactiver_Journalist(Request $request, $id)
    {
        $journalist = User::findOrFail($id);

        $journalist->update(['is_confirmed' => false]);

        return back()->with('session', 'Le compte du journaliste a été desactiver avec succès.');
    }

    

}
