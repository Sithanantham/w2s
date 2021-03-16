<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash; 
use App\User;
use App\Role;
use App\Menu;
use Auth;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard(){
        $user = Auth::user()->id;
        $data = User::where('id', '=', $user)->first();
        $dataMenu = @unserialize($data->menu_id);
        $dataMenu = (!empty($dataMenu) ? $dataMenu : []);
        $menu = Menu::whereIn('menu', $dataMenu)->where('soft_delete', '=', 1)->get();
        //dd($menu);
        return view('admin.dashboard', compact('data', 'menu'));
    }
    public function user(){
        $data = User::where(['soft_delete' => '1'])->with('getRole')->get();
        //dd($data);
       return view('admin.user.users_list', compact('data'));
    }

    public function add_user(){
        $role = Role::where('soft_delete', '=', 1)->get();
        $menu = Menu::where('soft_delete', '=', 1)->get();
        //dd($menu);
        return view('admin.user.add_user', compact('role', 'menu'));
    }

    public function save_user(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'conf_password' => 'required_with:password|same:password|min:6',
            'phone' => 'required|digits:10',
            //'role_id' => 'required',
            'status' => 'required',
        ]);
        if($request->password == $request->conf_password){
            $data = new User();
            $data->name = request('name');
            $data->email = request('email');
            $data->password = Hash::make(request('password'));
            $data->phone = request('phone');
            $data->role_id = request('role_id');
            $data->menu_id = serialize(request('menu_id'));
            $data->status = request('status');
            $data->save();
            return redirect('/admin/add_user')->with('message', 'User has been saved successfully');
        }else{
            return back()->with('message1', 'Failed to save the user');
        }
    }

    public function edit_user($id){
        $data = User::where('id', '=', $id)->first();
        $role = Role::where('soft_delete', '=', 1)->get();
        $menu = Menu::where('soft_delete', '=', 1)->get();
        return view('admin.user.edit_user', compact('data', 'role', 'menu'));
    }

    public function update_user(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'role_id' => 'required',
            'menu_id' => 'required',
            'status' => 'required',
        ]);
        $data = User::find($id);
        $data->name = request('name');
        $data->email = request('email');
        $data->password = Hash::make(request('password'));
        $data->phone = request('phone');
        $data->role_id = request('role_id');
        $data->menu_id = serialize(request('menu_id'));
        $data->status = request('status');
        $data->save();
        return redirect('/admin/users_list')->with('message', 'User has been updated successfully');       
    }

    public function status_user($id){
        $data = User::find($id);
        if($data->status == 1){
            $data->status = 0;
        }else{
            $data->status = 1;
        }
       // dd($data);
        $data->save();
        return redirect('/admin/users_list')->with('message', 'User status has been updated successfully');       
    }

    public function delete_user(Request $request, $id){
        $data = User::find($id);
        $data->soft_delete = 0;
        $data->save();
        return redirect('/admin/users_list')->with('message', 'User has been deleted successfully');  
    }

    public function role(){
        $data = Role::where(['soft_delete' => '1'])->get();
       // dd($data);
       return view('admin.role.role_list', compact('data'));
    }
    public function add_role(){
        return view('admin.role.add_role');
    }

    public function save_role(Request $request){
        $request->validate([
            'role' => 'required',
            'status' => 'required',
        ]);
        if($request->password == $request->conf_password){
            $data = new Role();
            $data->role = request('role');
            $data->status = request('status');
            $data->save();
            return redirect('/admin/add_role')->with('message', 'Role has been saved successfully');
        }else{
            return back()->with('message1', 'Failed to save the Role');
        }
    }

    public function edit_role($id){
        $data = Role::where('id', '=', $id)->first();
        return view('admin.role.edit_role', compact('data'));
    }

    public function update_role(Request $request, $id){
        $request->validate([
            'role' => 'required',
            'status' => 'required',
        ]);
        $data = Role::find($id);
        $data->role = request('role');
        $data->status = request('status');
        $data->save();
        return redirect('/admin/role_list')->with('message', 'Role has been updated successfully');       
    }

    public function status_role($id){
        $data = Role::find($id);
        if($data->status == 1){
            $data->status = 0;
        }else{
            $data->status = 1;
        }
       // dd($data);
        $data->save();
        return redirect('/admin/role_list')->with('message', 'Role status has been updated successfully');       
    }

    public function delete_role(Request $request, $id){
        $data = Role::find($id);
        $data->soft_delete = 0;
        $data->save();
        return redirect('/admin/role_list')->with('message', 'Role has been deleted successfully');  
    }

    public function menu(){
        $data = Menu::where(['soft_delete' => '1'])->get();
       // dd($data);
       return view('admin.menu.menu_list', compact('data'));
    }
    public function add_menu(){
        return view('admin.menu.add_menu');
    }

    public function save_menu(Request $request){
        $request->validate([
            'menu' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
        if($request->password == $request->conf_password){
            $data = new Menu();
            $data->menu = request('menu');
            $data->link = request('link');
            $data->status = request('status');
            $data->save();
            return redirect('/admin/add_menu')->with('message', 'Menu has been saved successfully');
        }else{
            return back()->with('message1', 'Failed to save the Menu');
        }
    }

    public function edit_menu($id){
        $data = Menu::where('id', '=', $id)->first();
        return view('admin.menu.edit_menu', compact('data'));
    }

    public function update_menu(Request $request, $id){
        $request->validate([
            'menu' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
        $data = Menu::find($id);
        $data->menu = request('menu');
        $data->link = request('link');
        $data->status = request('status');
        $data->save();
        return redirect('/admin/menu_list')->with('message', 'Menu has been updated successfully');       
    }

    public function status_menu($id){
        $data = Menu::find($id);
        if($data->status == 1){
            $data->status = 0;
        }else{
            $data->status = 1;
        }
       // dd($data);
        $data->save();
        return redirect('/admin/menu_list')->with('message', 'Menu status has been updated successfully');       
    }

    public function delete_menu(Request $request, $id){
        $data = Menu::find($id);
        $data->soft_delete = 0;
        $data->save();
        return redirect('/admin/menu_list')->with('message', 'Menu has been deleted successfully');  
    }

}
