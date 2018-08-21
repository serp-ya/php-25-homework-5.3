<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    public function showAll()
    {
      $contactsList = Contact::all();
      return view('main', ['contactsList' => $contactsList]);
    }

    public function createContact(Request $request)
    {
      $params = $request->all();

      if (!empty($params['name']) && !empty($params['phone'])) {
        Contact::insert([
          'name' => $params['name'], 
          'phone' => $params['phone']
        ]);
      }

      return redirect('/');
    }

    public function showEditInfo(Request $request)
    {
      $params = $request->all();

      if (empty($params['id'])) {
        redirect('/');
      }

      $id = $params['id'];

      $res = Contact::where('id', $id)->get();
      return view('edit', ['id' => $id, 'contact' => $res[0]]);
    }

    public function editContact(Request $request)
    {
      $params = $request->all();

      if (!empty($params['id']) && !empty($params['name']) && !empty($params['phone'])) {
        Contact::where('id', $params['id'])
          ->update([
            'name' => $params['name'],
            'phone' => $params['phone'],
          ]);
      }

      return redirect('/');
    }
}
