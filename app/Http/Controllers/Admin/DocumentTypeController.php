<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentTypeController extends Controller
{
    public function index()
    {
        Auth::user()->role;
        $documentTypes = DocumentType::all();
        // dd($documentTypes);
        // $eza = "AKU eza";
        return view('pages.admin.document_types', compact('documentTypes'));
    }

    public function create()
    {
        return view('pages.admin.create-document-type');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255|unique:document_types',
        // ]);

        DocumentType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('document-types.index')->with('success', 'Document Type created successfully!');
    }

    public function edit(DocumentType $documentType)
    {
        return view('document_types.edit', compact('documentType'));
    }

    public function update(Request $request, DocumentType $documentType)
    {
        $documentType->update([
            'name' => $request->name,
        ]);

        return redirect()->route('document-types.index')->with('success', 'Document Type updated successfully!');
    }

    public function destroy(DocumentType $documentType)
    {
        $documentType->delete();
        return redirect()->route('document-types.index')->with('success', 'Document Type deleted successfully!');
    }
}
