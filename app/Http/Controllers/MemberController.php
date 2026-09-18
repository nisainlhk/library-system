<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $title = 'Daftar Anggota';
        $description = 'Daftar anggota yang terdaftar di perpustakaan';
        $members = [
        'Nisa Ainul Hakim',
        'Kim Doyoung',
        'Jeong Jaehyun',
        'Naravit Lertratkosum',
        'Phuwin Tangsakyuen',
        ];

        return view('members.index', compact('title', 'description', 'members'));
    }

    public function show($id)
    {
        return "Detail Anggota - ID Anggota: " . $id;
    }
}
