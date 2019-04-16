<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
class ItemController extends Controller
{
    
    public function importExportView(){
    	$all_user = User::get();
    	return view('importExport', compact('all_user'));
    }

     public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return redirect()->back()->with('message', 'Data Import Successfully');
    }
}
