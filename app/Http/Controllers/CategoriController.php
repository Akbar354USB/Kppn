<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriController extends Controller
{
    public function create(){

        return view('wbbm.input_kategori');
    }

    public function storeCategories(Request $request)
{
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Kategori belum di masukkan',
        ]);

        Categories::create([
            'name' => $request->name
        ]);
    // dd($request->all());
    // return redirect()->route('wbbm-create')->with('success', 'Kategori berhasil ditambahkan');
    return redirect()-back();
}

    // public function index(Request $request){
    //     $students = student::with("major")->paginate(5);

    //     $filterKeyword = $request->get('nama');
    //     if($filterKeyword){
    //     $students = student::where("nama", "LIKE",
    //     "%$filterKeyword%")->paginate(5);
    //     }


    //     //return response()->json($students);
    //     return view('admin.student.index',compact("students"));
    // }

    

    // public function store(Request $request){
    //     $this->validate($request, [
    //         'nama' => 'required',
    //         'adress' => 'required',
    //         'major_id' => 'required',
    //     ],[
    //         'nama.required' => 'nama belum di masukkan',
    //         'major_id.required' => 'jurusan belum di masukkan',
    //         'adress.required' => 'alamat belum di masukkan'
    //     ]);

    //     student::create($request->all());

    //     return redirect()->route("student-index")->with('status', 'Sukses Tambah Data Siswa');
    // }

    // public function destroy($id){
    //     $student = student::where("id", $id)->first();
    //     $student->delete();
        
    //     return redirect()->route("student-index")->with('status', 'Sukses Hapus Data Siswa');
    // }

    // public function edit($id){
    //     $student = student::where("id", $id)->first();
    //     $major = Major::all();
    //     return view("admin.student.edit", compact("student","major"));
    // }

    // public function update(Request $request, $id){
    //     $student = student::where("id", $id)->first();
    //     $student->update($request->all());

    //     return redirect()->route("student-index")->with('status', 'Sukses Update Data Siswa');;
        

    // }

    // public function show($id){
    //     $student = student::with('major')->where("id", $id)->first();

    //     return view('admin.student.show', compact("student"));
    // }
}
