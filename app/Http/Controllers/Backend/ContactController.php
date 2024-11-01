<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Yajra\Datatables\Datatables;

class ContactController extends Controller
{
    public function index()
    {
        return view('backend.contact.index');
    }

    public function datatables()
    {
        $query = Contact::select(
            'id',
            'name',
            'email',
            'phone',
            'subject',
            'message',
            'created_at'
        );

        $datatables = Datatables::of($query);

        $datatables->escapeColumns([]);
        return $datatables->make(true);
    }
}
