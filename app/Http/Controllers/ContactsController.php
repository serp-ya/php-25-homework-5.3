<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    private $nameValidateRules = 'required|min:2';
    private $phoneValidateRules = 'required|min:10';

    public function showAll()
    {
      $contactsList = Contact::all();
      return view('main', ['contactsList' => $contactsList]);
    }

    public function createContact(Request $request)
    {
      $request->validate([
        'name' => $this->nameValidateRules,
        'phone' => $this->phoneValidateRules,
        
      ]);
      $params = $request->all();
      
      Contact::create([
        'name' => $params['name'], 
        'phone' => $params['phone']
      ]);

      return redirect()->route('mainPage');
    }

    public function showEditInfo(Request $request)
    {
      $params = $request->all();

      if (empty($params['id'])) {
        redirect()->route('mainPage');
      }

      $id = $params['id'];

      $res = Contact::find($id);

      return view('edit', ['id' => $id, 'contact' => $res]);
    }

    public function editContact(Request $request)
    {
      $request->validate([
        'id' => 'required',
        'name' => $this->nameValidateRules,
        'phone' => $this->phoneValidateRules,
      ]);

      $params = $request->all();

      Contact::find($params['id'])
        ->update([
          'name' => $params['name'],
          'phone' => $params['phone'],
        ]);

      return redirect()->route('mainPage');
    }
}
