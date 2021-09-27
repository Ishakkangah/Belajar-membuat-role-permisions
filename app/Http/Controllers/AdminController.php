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
use App\Models\mahasiswa_asing;
use App\Models\model_has_roles;
use App\Models\orang_tua_wali;
use App\Models\program;
use App\Models\status_menikah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {   
        $role = Role::find(3);
        $users = $role->users()->latest()->paginate(20);
        $judul = 'Mahasiswa';
        return view('Dashboard.admin.index', compact([
            'users',
            'judul',
            ]),
        );
    }


    public function show(User $user)
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

    
    public function edit(User $user)
    {   
        $roles = Role::get();
        return view('Dashboard.admin.edit', compact(['user']));
    }

    public function store(usersRequest $request, User $user)
    {
        $attr = request()->all();
        $attr['name'] = request('name');
        $attr['email'] = request('email');

        $user->update($attr);
        return redirect('/admin')->with('status', 'User was updated');
    }


    // public function delete(User $user)
    // {
    //     $user->delete();
    //     return redirect('/admin')->with('status', 'data was deleted succesfully');
    // }


    public function changepassword(User $user)
    {
        return view('Dashboard.admin.changePassword', compact('user'));
    }

    public function storepassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:5|max:30|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user->update(['password' => Hash::make($request->password)]);
        return redirect('/admin')->with('status', 'password user has been update');
    }


    public function editRoles(Request $request, User $user)
    {
        $roles = Role::all();
        return view('Dashboard.admin.editRoles',compact(
            'user', 
            'roles',
        ));
    }


    public function storeRoles(User $user)
    {   
        $data = request()->roles;
        $user->syncRoles($data);

        return redirect('/admin')->with('status', 'The roles was updated succesfully');
    }


    public function createRole(User $user)
    {
        $roles = Role::get();
        return view('Dashboard.admin.createRoles', compact([
            'user',
            'roles',
        ]));
    }

    public function sendRole(Request $request, User $user)
    {
        $data = $request->roles;
        $user->syncRoles($data);

        return redirect('/admin')->with('status', 'The data was created successfully');
    }


    public function givePermission(User $user)
    {   
        $permissions = Permission::get();
        return view('Dashboard.admin.createPermission',compact([
            'user',
            'permissions',
        ]));

    }

    
    public function storePermission(Request $request, User $user)
    {
        $request->validate([
            'permissions' => 'required|array'
        ]);
        
        $data = $request->permissions;
        $user->givePermissionTo($data);

        return redirect('/admin')->with('status', 'The permissions was created');
    }


    public function editPermission(User $user)
    {

        $permissions = permission::get();
        return view('Dashboard.admin.editPermission', compact([
            'user',
            'permissions'
            ])
        );
    }


    public function sendPermission(Request $request, User $user)
    {
        $request->validate([
            'permissions' => 'required|array',
        ]);
        $data = $request->permissions;
        $user->syncPermissions($data);

        return redirect('/admin')->with('status', 'the data was updated successfully');
    }



    public function deletePermission(User $user, Permission $permission)
    {
        $data = $user->permissions;
        $user->revokePermissionTo($data);
        return redirect('/admin')->with('status', 'the data was deleted successfully');
    }


    // DELETE ROLES
    public function delete_Roles(User $user)
    {
        $user->removeRole('user');
        return back()->with('status', 'Role ' .  $user->name . ' berhasil dihapus');
    }


    // TAMBAH ADMIN
    public function Tambah_Admin()
    {
        $program_id = program::get();
        $angkatan_id = angkatan::get();
        $users = User::all(); 
        return view('Dashboard.admin.tambah_admin',compact([
            'users',
            'program_id',
            'angkatan_id',
        ]));
    }



    // STORE TAMBAH ADMIN
    public function store_Tambah_Admin(Request $request)
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

             $users = User::create([
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

            $users->assignRole('admin');
        return back()->with('status', 'admin baru berhasil ditambahakan');
    }
}













