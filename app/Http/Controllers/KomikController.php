<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Komik;
use illuminate\Support\Facades\Validator;
use App\Http\Resources\KomikResource;
class KomikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komiks = Komik::all();
        return response()->json([
            'status' =>true,
            'massage'=> 'Data Ditemukan',
            'data' => $komiks
        ],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $komik = new Komik;

        $validated = $request->validate([
            'judul' => 'required|string',
            'genre' => 'required|string',
            'pengarang' => 'required|string',
            'tanggal_publikasi' => 'required|date',
        ]);
        
        
        $komik = \App\Models\Komik::create($validated);
        if ($komik) {
            return response()->json([
                'status' => true,
                'massage' => 'Komik berhasil ditambahkan',
                'data' => $komik
            ], 200);
        } 
    //     if ($validator->fails()) {
    //         return new KomikResource(null, 'Failed', $validator->errors());
    //     }
        
    //     $komiks = Komik::create($request->all());
    //     return new KomikResource($komiks, 'Success', 'Data Berhasil Ditambahkan');
    // }
    //     // // $komik = \App\Models\Komik::create($validator);
        // $komik->judul = $request->judul;
        // $komik->genre = $request->genre;
        // $komik->pengarang = $request->pengarang;
        // $komik->tanggal_publikasi = $request->tanggal_publikasi;

        // $post = $komik->save();
        
        // return response()->json([
        //             'status' => true,
        //             'massage' => 'Komik berhasil ditambahkan',
        //         ], 200);
            
        // $komik = \App\Models\Komik::create($validated);
        // if ($komik) {
        //     return response()->json([
        //         'status' => true,
        //         'massage' => 'Komik berhasil ditambahkan',
        //         'data' => $komik
        //     ], 200);
        // }  else {
        //     return response()->json([
        //         'status' => false,
        //         'massage' => 'Gagal menambahkan komik',
        //         'data' => $komik->error()
        //     ], 500); // gunakan 500 untuk error server
        // }
        
        // $komik = [
        //     'judul' => 'required',
        //     'genre' => 'required',
        //     'pengarang' => 'required',
        //     'tanggal_publikasi' => 'required|date'
        // ];
        
        // $validator = Validator::make($request->all(), $komik);
        
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Gagal memasukkan data',
        //         'data' => $validator->errors()
        //     ]);
        // }
        //     // $komik = Komik::create($request->all());
        //         // $komik = \App\Models\Komik::create();
                
        //         return response()->json([
        //             'status' => true,
        //             'message' => 'Sukses memasukkan data!',
        //             'data' => $komik
        //         ], 200); // 201 Created
            
            // Jika gagal menyimpan ke database
        
    
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'judul' => 'required|string',
            'genre' => 'required|string',
            'pengarang' => 'required|string',
            'tanggal_publikasi' => 'required|date',
        ]);

        $komik = Komik::find($id);
        if (!$komik) {
            return response()->json(['message' => 'Komik tidak ditemukan'], 404);
        }

        // Update data komik
        $komik->judul = $validated['judul'];
        $komik->genre = $validated['genre'];
        $komik->pengarang = $validated['pengarang'];
        $komik->tanggal_publikasi = $validated['tanggal_publikasi'];
        $komik->save();

        
        return response()->json([
            'status' => true,
            'message' => 'Komik berhasil diperbarui',
            'data' => $komik
        ], 200);
    }
    



    public function destroy(string $id)
    {
    //     $komiks = Komik::find($id);
    //     if (!$komiks) {
    //         return new KomikResource(null, 'Failed', 'Komik tidak ditemukan');
    //     }

    //     // Menghapus data komik
    //     $komiks->delete();
    //     return new KomikResource(null, 'Success', 'Data Berhasil Dihapus');
    // }
     $komik = \App\Models\Komik::find($id);

    // Memeriksa apakah komik ditemukan
//     if (!$komik) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Komik tidak ditemukan'
//         ], 404);
//     }

//     // Menghapus komik
//     $komik->delete();

//     // Mengembalikan respons sukses
//     return response()->json([
//         'status' => true,
//         'message' => 'Komik berhasil dihapus'
//     ], 200);
// }
    $komik = Komik::find($id);
    if (!$komik) {
    return response()->json(['message' => 'Komik tidak ditemukan']);
    }

    // Hapus komik
    $komik->delete();

    return response()->json(['message' => 'Komik berhasil dihapus'], 200);
    }
    }
