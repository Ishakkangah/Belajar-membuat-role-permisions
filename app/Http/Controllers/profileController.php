<?php

namespace App\Http\Controllers;

use App\Http\Requests\usersRequest;
use App\Models\agama;
use App\Models\alamat;
use App\Models\angkatan;
use App\Models\asal_sekolah;
use App\Models\dosen_wali;
use App\Models\golongan_darah;
use App\Models\jenis_kelamin;
use App\Models\kurikulum;
use App\Models\mahasiswa_asing;
use App\Models\orang_tua_wali;
use App\Models\program;
use App\Models\status;
use App\Models\status_menikah;
use App\Models\User;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class profileController extends Controller
{
    public function show()
    {
    $user =  auth()->user();
    $golongan_darahs = golongan_darah::get();
    $dosen_walis = dosen_wali::get();
    $jenis_kelamins = jenis_kelamin::get();
    $agamas = agama::get();
    $status_menikahs = status_menikah::get();
    return view('Dashboard.profile.index', compact([
        'user',
        'golongan_darahs',
        'dosen_walis',
        'jenis_kelamins',
        'agamas',
        'status_menikahs',
        ]));    
    }


    public function store(Request $request, User $user)
    {
        $request->validate([
            'dosen_wali' => 'string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:2',
            'jenis_kelamin' => 'required|string|max:20',
            'agama' => 'required|string',
            'status_menikah' => 'required|string',
            'no_hp' => 'required|numeric',
            'ktp' => 'numeric||digits:16',
        ]);

        $attr['dosen_Wali_id'] = $request->dosen_wali;
        $attr['tanggal_lahir'] = $request->tanggal_lahir;
        $attr['tempat_lahir'] = $request->tempat_lahir;
        $attr['golongan_darah_id'] = $request->golongan_darah;
        $attr['jenis_kelamin_id'] = $request->jenis_kelamin;
        $attr['agama_id'] = $request->agama;
        $attr['status_menikah_id'] = $request->status_menikah;
        $attr['no_hp'] = $request->no_hp;
        $attr['ktp'] = $request->ktp;

        $user->update($attr);
        return back()->with('status', 'the data was updated');
    }


    public function thumbnail(User $user)
    {
        $user =  auth()->user();
        $golongan_darahs = golongan_darah::get();
        $dosen_walis = dosen_wali::get();
        $jenis_kelamins = jenis_kelamin::get();
        $agamas = agama::get();
        $status_menikahs = status_menikah::get();
        return view('Dashboard.user.thumbnail',compact([
            'user',
            'golongan_darahs',
            'dosen_walis',
            'jenis_kelamins',
            'agamas',
            'status_menikahs',
        ]));
    }





    
    
    public function store_thumbnail(Request $request, User $user)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);


        // $request->thumbnail->store('User/images');

        if ($request->file('thumbnail')) {
            \Storage::delete($user->thumbnail);
            $file_name = $request->thumbnail->getClientOriginalName();
            $attr['thumbnail'] = $request->thumbnail->storeAs('User/images', $file_name);
        } else {
            $attr['thumbnail'] = $user->thumbnail;
        } 
        $user->update($attr);
        return redirect('/profile')->with('status', 'Updated was successfully');
        
    }


    public function gantiPassword(User $user)
    {
        return view('Dashboard.user.gantiPassword', compact([
            'user',
        ]));
    }


    public function storeGantiPassword(Request $request, User $user)
    {

        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|max:30|min:5|confirmed',
        ]);

        if(Hash::check($request->current_password, auth()->user()->password))
        {
            $user->update(['password' => bcrypt($request->password) ]);
            return back()->with('status', 'your password has been updated');
        } else
        {
            return back()->with('error', 'your current password does not match with our record');
            
        }        

    }

    public function editProgram(User $user)
    {
        $programs = program::get();
        $angkatans = angkatan::get();
        $kurikulums = kurikulum::get();
        $statuses = status::get();

        return view('Dashboard.user.editProgram', compact([
            'user',
            'programs',
            'angkatans',
            'kurikulums',
            'statuses',
        ]));
    }


    public function storeProgram(Request $request, User $user)
    {
        $request->validate([
            'program' => 'required',
            'angkatan' => 'required|numeric',
            'kurikulum' => 'required',
            'status' => 'required',
        ]);        
        
        $attr['program_id'] = $request->program;
        $attr['angkatan_id'] = $request->angkatan;
        $user->update($attr);
       
        
        $jembut['kurikulum_id'] = $request->kurikulum;
        $jembut['status_id'] = $request->status;
        
        auth()->user()->program()->update($jembut);
        return back()->with('status', 'The was updated successfully');
    
    }

    // orang tua wali
    public function orangTuaWali(Request $request, User $user)
    {
        $orang_tua_wali = $user->orang_tua_Wali;
        return view('Dashboard.personal.orang_tua_wali',compact([
            'user',
            'orang_tua_wali',

        ]));

    }


    public function updateOrangTuaWali(Request $request, User $user)
    {
       
        $request->validate([
            'nama_wali' => 'required|string|max:100',
            'ktp_ayah' => 'nullable|numeric|digits:16',
            'perkerjaan_ayah' => 'required|string',
            'nim_nrp_ayah' => 'nullable|numeric|digits:16',
            'pangkat_ayah' => 'nullable|string|max:100',
            'nama_instansi' => 'nullable|string|max:100',
            'alamat_instansi' => 'nullable|string|max:100',
            'nama_ibu' => 'required|string|max:100',
            'ktp_ibu' => 'nullable|numeric|digits:16',
            'perkerjaan_ibu' => 'string|max:100',
        ]);

        $attr['nama_ayah_wali'] = $request->nama_wali;
        $attr['slug'] = $request->nama_wali;
        $attr['ktp_ayah'] = $request->ktp_ayah;
        $attr['perkerjaan_ayah'] = $request->perkerjaan_ayah;
        $attr['nip_ayah'] = $request->nim_nrp_ayah;
        $attr['pangkat_ayah'] = $request->pangkat_ayah;
        $attr['nama_instansi_ayah'] = $request->nama_instansi;
        $attr['alamat_instansi_ayah'] = $request->alamat_instansi;
        $attr['nama_ibu'] = $request->nama_ibu;
        $attr['ktp_ibu'] = $request->ktp_ibu;
        $attr['perkerjaan_ibu'] = $request->perkerjaan_ibu;

        auth()->user()->orang_tua_wali()->update($attr);

        return back()->with('status', 'The data wass updated');
    }

    // asal sekolah
    public function asalSekolah(Request $request, User $user)
    {

        return view('Dashboard.personal.asal_Sekolah', compact([
            'user',
        ]));
    }


    public function storeSekolah(Request $request, User $user)
    {
        $attr['asal_sekolah'] = $request->asal_sekolah;
        $attr['alamat_sekolah'] = $request->alamat_sekolah;
        $attr['negara'] = $request->negara;
        $attr['jurusan'] = $request->jurusan;
        $attr['nomor_ijazah_sma'] = $request->nomor_ijazah_sma;

        auth()->user()->asal_sekolah()->update($attr);

        return back()->with('status', 'the data was updated');
    }


    // alamat
    public function alamat(Request $request, User $user)
    {
        return view('Dashboard.personal.alamat', compact([
            'user',
        ]));
    }


    public function storeAlamat(Request $request, User $user)
    {
        $request->validate([
            'alamat_rumah' => ['required', 'string', 'max:100'],
            'kota' => ['required', 'string', 'max:100'],
            'provinsi' => ['required', 'string', 'max:100'],
            'kode_pos' => ['numeric', 'nullable'],
            'telepon_rumah' => ['numeric', 'nullable'],
        ]);

        $attr['alamat_rumah'] = $request->alamat_rumah;
        $attr['kota'] = $request->kota;
        $attr['provinsi'] = $request->provinsi;
        $attr['kode_pos'] = $request->kode_pos;
        $attr['telepon_rumah'] = $request->telepon_rumah;

        $user->alamat()->update($attr);
        return back()->with('status', 'data was updated');
    }


    // mahasiswa asing
    public function mahasiswa_asing(Request $request, User $user)
    {
        return view('Dashboard.personal.mahasiswa_asing', compact([
            'user',
        ]));
    }

    public function store_mahasiswa_asing(Request $request, User $user)
    {
        $request->validate([
            'paspor_tipe' => 'max:100|string',
            'paspor_kode' => 'max:100|string',
            'paspor_nomor' => 'max:100|string|numeric',
            'visa_tipe' => 'max:100|string',
            'visa_indeks' => 'max:100|string',
            'expired_date' => 'max:100|string|date',
        ]);
        $attr['paspor_tipe'] = $request->paspor_tipe;
        $attr['paspor_kode'] = $request->paspor_kode;
        $attr['paspor_nomor'] = $request->paspor_nomor;
        $attr['visa_indeks'] = $request->visa_indeks;
        $attr['expired_date'] = $request->expired_date;
   
        $user->mahasiswa_asing()->update($attr);
        return back()->with('status', 'updated was successfully');
    }


    // Daptar Mahasiswa
    public function Daptar_Mahasiswa(User $user)
    {   
        $role = role::find(3);
        $users = $role->users()->latest()->paginate(10);
        $judul = 'MAHASISWA';
        $button = 'Tambah Mahasiswa';
        $href = '/roles/Tambah_mahasiswa';
        return view('Dashboard.daptar_mahasiswa.index', compact([
            'users',
            'judul',
            'button',
            'href',
        ]));
    }



    // TAMBAH MAHASISWA
    public function Tambah_Mahasiswa()
    {
        $program_id = program::get();
        $angkatan_id = kurikulum::get();
        $judul = 'mahasiswa';
        $link = '/roles/Tambah_Mahasiswa';
        return view('Dashboard.daptar_mahasiswa.tambah_dosen', compact([
            'angkatan_id',
            'program_id',
            'judul',
            'link',
        ]));
    }


    // STORE TAMBAH MAHASISWA 
    public function Store_Tambah_Mahasiswa(Request $request )
    {
     
        $img = \DefaultProfileImage::create("thumbnail");
        \Storage::put("profile.png", $img->encode());

            // table mahasiswa asing
            $mahasiswa_asing = mahasiswa_asing::create([
                'paspor_tipe' => '',
                'paspor_kode' => '',
                'paspor_nomor' => '',
                'visa_tipe' => '',
                'visa_indeks' => '',
                'expired_date' => '',
            ]);

            // table alamat
            $alamat = alamat::create([
                'alamat_rumah' => '',
                'kota' => '',
                'provinsi' => '',
                'kode_pos' => '',
                'telepon_rumah' => '',
            ]);
            
            // table asal sekolah
            $asal_sekolah = asal_sekolah::create([
                'asal_sekolah' => '',
                'alamat_sekolah' => '',
                'negara' => '',
                'jurusan' => '',
                'nomor_ijazah_sekolah' => '',
            ]);


            dosen_wali::create([
                'name' => $request->name,
                'slug' => \Str::slug($request->name),
            ]);
            
            // table orang tua wali
            $orang_tua_wali = orang_tua_wali::create([
            'nama_ayah_wali' => '',
            'slug' => $request->name,
            'ktp_ayah' => 'NULL',
            'perkerjaan_ayah' => '',
            'nip_ayah' => '',
            'pangkat_ayah' => '',
            'nama_instansi_ayah' => '',
            'alamat_instansi_ayah' => '',
            'nama_ibu' => '',
            'ktp_ibu' => '',
            'perkerjaan_ibu' => '',
            ]);

            
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'nidn' => ['required', 'string', 'numeric', 'digits:7', 'unique:users,nrp'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'jurusan' => ['required', 'string', 'max:4'],
                'angkatan' => ['required', 'string', 'max:4'],
                'password' => ['required', 'string', 'min:8'],
      
            ]);


             $dosen = User::create([
            'name' => $request->name,
            'nrp' => $request->nidn,
            'email' => $request->email,
            'program_id' => $request->jurusan,
            'angkatan_id' => $request->angkatan,
            'orang_tua_wali_id' => $orang_tua_wali->id,
            'asal_sekolah_id' => $asal_sekolah->id,
            'alamat_id' => $alamat->id,
            'mahasiswa_asing_id' =>  $mahasiswa_asing->id ,
            'thumbnail' => 'profile.png',
            'password' => Hash::make($request->password),
        ]);
            $dosen->assignRole('user');



        return back()->with('status', 'Mahasiswa baru berhasil ditambahkan');
   
    }


    public function Daptar_mahasiswa_personal(User $user)
    {
        $golongan_darahs = golongan_darah::get();
        $dosen_walis = dosen_wali::get();
        $jenis_kelamins = jenis_kelamin::get();
        $agamas = agama::get();
        $status_menikahs = status_menikah::get();

        return view('Dashboard.profile.index', compact([
            'user',
            'golongan_darahs',
            'dosen_walis',
            'jenis_kelamins',
            'agamas',
            'status_menikahs',
            ]));   
    }



    // Daftar admin
    public function Daptar_admin()
    {   
        $roles = Role::find(2);
        $all_users = $roles->users()->get();
        $users = $roles->users()->latest()->paginate(10);
        $judul = 'ADMIN';
        $button = 'Tambah Admin';
        $href = '/roles/Tambah_Admin';
        return view('Dashboard.daptar_mahasiswa.index', compact([
            'users',
            'all_users',
            'judul',
            'button',
            'href',
        ]));
    }

    // belum disini
    // Daptar Jurusan
    public function Daptar_Jurusan(program $program)
    {
        $all_users =  $program->users()->get();;
        $users = $program->users()->latest()->paginate(10);
        $judul = 'MAHASISWA';
        $button = 'Tambah Jurusan';
        $href = '/personal/Tambah_jurusan';
        return view('Dashboard.daptar_mahasiswa.index', compact([
            'users',
            'all_users',
            'judul',
            'href',
            'button',
        ]));
    }


    // Delete_Mahasiswa
    public function Delete_Mahasiswa(User $user)
    {

        \Storage::delete($user->thumbnail);
        $user->orang_tua_wali->delete();
        $user->alamat->delete();
        $user->mahasiswa_asing->delete();
        $user->asal_sekolah->delete();
        $user->delete();
        return redirect('/profile/Daptar_Mahasiswa')->with('status', 'Deleted was successfully');
    }

    // Daptar Dosen
    public function Daptar_Dosen()
    {
        $Role =  Role::find(4);
        $dosen_walis = $Role->users()->latest()->paginate(2);
        
        $judul = 'Dosen';
        return view('Dashboard.daptar_mahasiswa.dosen', compact([
            'dosen_walis',
            'judul',
        ]));
    }
    



    // Tambah Dosen
    public function Tambah_Dosen()
    {
        $program_id = program::get();
        $angkatan_id = kurikulum::get();
        $judul = 'dosen';
        $link = '/personal/Tambah_Dosen';
        return view('Dashboard.daptar_mahasiswa.tambah_dosen', compact([
            'angkatan_id',
            'program_id',
            'judul',
            'link',
        ]));
    }
    
    
    
    // Store Tambah Dosen
    public function store_Tambah_Dosen(Request $request)
    {   


        $img = \DefaultProfileImage::create("thumbnail");
        \Storage::put("profile.png", $img->encode());

            // table mahasiswa asing
            $mahasiswa_asing = mahasiswa_asing::create([
                'paspor_tipe' => '',
                'paspor_kode' => '',
                'paspor_nomor' => '',
                'visa_tipe' => '',
                'visa_indeks' => '',
                'expired_date' => '',
            ]);

            // table alamat
            $alamat = alamat::create([
                'alamat_rumah' => '',
                'kota' => '',
                'provinsi' => '',
                'kode_pos' => '',
                'telepon_rumah' => '',
            ]);
            
            // table asal sekolah
            $asal_sekolah = asal_sekolah::create([
                'asal_sekolah' => '',
                'alamat_sekolah' => '',
                'negara' => '',
                'jurusan' => '',
                'nomor_ijazah_sekolah' => '',
            ]);


            dosen_wali::create([
                'name' => $request->name,
                'slug' => \Str::slug($request->name),
            ]);
            
            // table orang tua wali
            $orang_tua_wali = orang_tua_wali::create([
            'nama_ayah_wali' => '',
            'slug' => $request->name,
            'ktp_ayah' => 'NULL',
            'perkerjaan_ayah' => '',
            'nip_ayah' => '',
            'pangkat_ayah' => '',
            'nama_instansi_ayah' => '',
            'alamat_instansi_ayah' => '',
            'nama_ibu' => '',
            'ktp_ibu' => '',
            'perkerjaan_ibu' => '',
            ]);

            
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'nidn' => ['required', 'string', 'numeric', 'digits:7', 'unique:users,nrp'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'jurusan' => ['required', 'string', 'max:4'],
                'angkatan' => ['required', 'string', 'max:4'],
                'password' => ['required', 'string', 'min:8'],
      
            ]);


             $dosen = User::create([
            'name' => $request->name,
            'nrp' => $request->nidn,
            'email' => $request->email,
            'program_id' => $request->jurusan,
            'angkatan_id' => $request->angkatan,
            'orang_tua_wali_id' => $orang_tua_wali->id,
            'asal_sekolah_id' => $asal_sekolah->id,
            'alamat_id' => $alamat->id,
            'mahasiswa_asing_id' =>  $mahasiswa_asing->id ,
            'thumbnail' => 'profile.png',
            'password' => Hash::make($request->password),
        ]);
            $dosen->assignRole('dosen');



        return back()->with('status', 'Dosen baru berhasil ditambahkan');

    }

    // Delete Dosen
    public function Delete_Dosen(dosen_wali $dosen_wali)
    {   

        // $dosen_wali = $dosen_wali->users->delete();
        return back()->with('status', 'Dosen berhasil dihaspus');
    }


    // DAPTAR SEMUA JURUSAN
    public function Daptar_Semua_Jurusan()
    {
        $href = 'personal/Daptar_Semua_Jurusan';
        $programs = program::latest()->paginate(10);
        return view('Dashboard.daptar_mahasiswa.daptar_semua_jurusan', compact([
            'programs',
            'href',
        ]));
    }


    // TAMBAH JURUSAN
    public function Tambah_Jurusan(Request $reques)
    {
        $status = status::get();
        $kurikulums = kurikulum::get();
        return view('Dashboard.daptar_mahasiswa.tambah_jurusan', compact([
            'status',
            'kurikulums',
        ]));
    }


    // STORE TAMBAH JURUSAN
    public function Store_Tambah_Jurusan (Request $request)
    {   
        $request->validate([
            'jurusan' => ['required', 'string', 'max:200'],
            'status' => ['required'],
            'kurikulum' =>['required' ],
        ]);


        $attr['name'] = $request->jurusan;
        $attr['slug'] = \Str::slug($request->jurusan);
        $attr['status_id'] = $request->status;
        $attr['kurikulum_id'] = $request->kurikulum;
   
        program::create($attr);
        return back()->with('status', 'Jurusan baru berhasil ditambahkan');
    }


    // DELETE JURUSAN
    public function Delete_Jurusan (Request $request, program $program)
    {   
        $program->delete();
        return back()->with('status', 'Jurusan berhasil dihapus');
    }


    // DAPTAR KURIKULUM
    public function Daptar_Kurikulum()
    {
        $kurikulums = kurikulum::orderByRaw('name')->get();
        return view('Dashboard.daptar_mahasiswa.daptar_kurikulum', compact([
            'kurikulums',
        ]));
    }




    // TAMBAH KURIKULUM
    public function Tambah_Kurikulum()
    {
        return view('Dashboard.daptar_mahasiswa.tambah_kurikulum');
        return back()->with('status', "Kurikulum " . $kurikulum->name .   " berhasil di hapus");
    }



    // STORE TAMBAH KURIKULUM
    public function Store_Tambah_Kurikulum(Request $request)
    {
        $request->validate([
            'kurikulum' => ['numeric', 'digits:4', 'unique:kurikulums,name'],
        ]);
        $attr['name'] = $request->kurikulum;
        $attr['slug'] = \Str::slug($request->kurikulum);
        kurikulum::create($attr);

        return back()->with('status', "Kurikulum $request->name berhasil ditambahkan");
    }


    // DELETE KURIKULUM
    public function Delete_Kurikulum(kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return back()->with('status', "Kurikulum " . $kurikulum->name .   " berhasil di hapus");
    }



}




