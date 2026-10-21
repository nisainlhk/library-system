<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $title = 'Daftar Anggota';
        $description = 'Anggota yang terdaftar';
        $members = Member::orderBy('name')->get();

        return view('members.index', compact('title', 'description', 'members'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255|unique:members,name',
            'description' => 'nullable|string',
        ]);

        Member::create($data);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

}
