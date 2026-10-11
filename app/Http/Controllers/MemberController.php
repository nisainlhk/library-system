<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $title = 'Daftar Anggota';
        $description = 'Anggota yang terdaftar';
        $members = Member::orderBy('name')->get();

        return view('members.index', compact('title', 'description', 'members'));
    }
}
