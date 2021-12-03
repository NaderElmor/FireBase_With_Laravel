<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class ContactController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tableName = 'contacts';
    }

    public function index(){

        $contacts = $this->database->getReference($this->tableName)->getValue();
       $totalContacts =  $this->database->getReference($this->tableName)->getSnapshot()->numChildren();
        return view('firebase.contact.index', compact('contacts','totalContacts'));
    } 
    
    public function create(){

        return view('firebase.contact.create');
    }

    public function store(Request $request){

        $postData = [

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        $postRef = $this->database->getReference($this->tableName)->push($postData);

        if($postRef){
          return  redirect('contacts')->with('status', 'Conatct Added Successfully');
        } else {
            return  redirect('contacts')->with('status', 'Conatct Not Added');
        }
        
    }

    public function edit($id){
        $key = $id;

        $editData =  $this->database->getReference($this->tableName)->getChild($key)->getValue();
        if($editData){
            return view('firebase.contact.edit', compact('editData','key'));
        } else {
              return  redirect('contacts')->with('status', 'Conatct ID Not Found');
          }
    }

    public function update(Request $request, $id){

        $key = $id;
        $contactData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        $updatedData = $this->database->getReference($this->tableName.'/'.$key)->update($contactData);

        if($updatedData){
          return  redirect('contacts')->with('status', 'Conatct Updated Successfully');
        } else {
            return  redirect('contacts')->with('status', 'Conatct Not updated');
        }
        
    }  
    
    public function destroy($id){

        $key = $id;
    
        $deletedData = $this->database->getReference($this->tableName.'/'.$key)->remove();

        if($deletedData){
          return  redirect('contacts')->with('status', 'Conatct Deleted Successfully');
        } else {
            return  redirect('contacts')->with('status', 'Conatct Not Deleted');
        }
        
    }

}
