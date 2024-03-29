<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Address;

class ContactController extends Controller
{
    public function display()
    {
        $contacts = Contact::all();
        return response()->json([
            'status' => 'success',
            'data' => $contacts,
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $exist = Contact::where('phone', $request->phone)->first();

        if ($exist) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Contact exist',
                'data' => $exist,
            ]);
        }

        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Contact created successfully',
            'data' => $contact,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $contact = Contact::where('id', $request->id)->first();

        if (!$contact) {
            return response()->json([
                'status' => 'error',
                'message' => 'Contact not found',
            ]);
        }


        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->latitude = $request->latitude;
        $contact->longitude = $request->longitude;
        $contact->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Contact updated successfully',
            'data' => $contact,
        ]);
    }

    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);
        if (!$contact) {
            return response()->json([
                'status' => 'error',
                'message' => 'Contact not found',
            ]);
        }

        $contact->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Contact deleted successfully',
        ]);
    }
}
