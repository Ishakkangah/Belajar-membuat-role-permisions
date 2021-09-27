<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\alamat;
use App\Models\asal_sekolah;
use App\Models\mahasiswa_asing;
use App\Models\orang_tua_wali;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'nrp' => ['required', 'string', 'numeric', 'digits:7', 'unique:users,nrp'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'jurusan' => ['required', 'string', 'max:4'],
            'angkatan' => ['required', 'string', 'max:4'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data 
     * @return \App\Models\User
     */
    protected function create(array $data)
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
            
            // table orang tua wali
            $orang_tua_wali = orang_tua_wali::create([
            'nama_ayah_wali' => '',
            'slug' => $data['name'],
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

        
           $user =  User::create([
            'name' => $data['name'],
            'nrp' => $data['nrp'],
            'email' => $data['email'],
            'program_id' => $data['jurusan'],
            'angkatan_id' => $data['angkatan'],
            'orang_tua_wali_id' => $orang_tua_wali->id,
            'asal_sekolah_id' => $asal_sekolah->id,
            'alamat_id' => $alamat->id,
            'mahasiswa_asing_id' =>  $mahasiswa_asing->id ,
            'thumbnail' => 'profile.png',
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('user');
        return $user;

    }
}
