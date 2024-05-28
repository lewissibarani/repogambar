<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as Auths;
use \JKD\SSO\Client\Provider\Keycloak;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.authentication.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    // public function actionSso(Request $request)
    // {  

    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);
 
    //     if (Auth::attempt($credentials)) {
           
    //         $request->session()->regenerate();
 
    //         return redirect()->intended('dashboard.halamandepan');
    //     }
 
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');

    //         // Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
    // } 
    // public function loginpage()
    // {  

    //     return view('auth.login');
    // } 
    public function actionSso(Request $request)
    {

         /** Implement SSO Dec 2020 */
        $provider = new Keycloak([
            'authServerUrl'         => 'https://sso.bps.go.id',
            'realm'                 => 'pegawai-bps',
            'clientId'              => env('KEYCLOAK_CLIENT_ID'),
            'clientSecret'          => env('KEYCLOAK_CLIENT_SECRET'),
            'redirectUri'           => env('KEYCLOAK_REDIRECT_URI'),
        ]);
        
        if (!isset($_GET['code'])) {

            // Untuk mendapatkan authorization code
            $authUrl = $provider->getAuthorizationUrl();
            $request->session()->put('oauth2state', $provider->getState());
            header('Location: '.$authUrl);
            exit;

        } elseif (empty($_GET['state']))
            {
                $request->session()->forget('oauth2state');
                exit('Invalid state');
        }
        else {
            try {
                $token = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);
            } catch (\Exception $e) {
                exit('Gagal mendapatkan akses token : '.$e->getMessage());
            }
            
            // Opsional: Setelah mendapatkan token, anda dapat melihat data profil pengguna
            try {
                 
                $user = $provider->getResourceOwner($token);

                $email = $user->getEmail();
                $kodesatker = $user->getKodeOrganisasi(); 
                $kodesatker_trim = substr($kodesatker, 0,4);
                if($kodesatker_trim=="0000"){
                    $kodesatker_trim=substr($kodesatker,-5);
                }

                //proses sync kode untuk papua dikarenakan jkd belum update kodesatker 
                $key=0; 
                $arraykodesatker_benar=['9502','9503','9504','9604','9605','9608','9702','9703'];
                $arraykodesatker_salah=['9413','9414','9415','9404','9410','9411','9402','9430'];

                foreach($arraykodesatker_salah as $array){ 
                if ($kodesatker_trim==$array){
                    $kodesatker_trim = $arraykodesatker_benar[$key];
                }
                $key++;
                } 
                //proses sync selesai

                $golongan = $user->getGolongan();
                $jabatan = $user->getJabatan(); 
                $foto = $user->getUrlFoto();

                $id = User::where('email', $email)->first();

                if (!empty($id)) {
                    //selalu update kode satker user kalau ada yang mutasi tetap update
                    $id->kodesatker = $kodesatker_trim;
                    $id->golongan = $golongan;
                    $id->jabatan = $jabatan;
                    $id->profilepicture = $foto;
                    $id->save();

                    $id = $id->id;
                   
                } else {
                    $newUser = User::create([
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'level' => 4,
                        'nip' => $user->getNip(),
                        'nipbaru' => $user->getNipBaru(), 
                        'golongan' => $user->getGolongan(),
                        'jabatan' => $user->getJabatan(),
                        'profilepicture' => $user->getUrlFoto(),
                        'kodesatker' =>$kodesatker_trim,
                        'satker' =>$user->getEselon(),
                        'password' =>Hash::make('pks2022'),
                        'sums_download' =>0,
                        'sums_upload' =>0,
                        'sum_permintaan' =>0, 
                    ]);
                    $id = $newUser->id;
                }

                // Login dengan menggunakan id pengguna dari record di database aplikasi
                if (Auths::loginUsingId($id)) {
                    return redirect()->intended('/Dashboard');
                } else {
                    return redirect('/');
                }

            } catch (\Exception $e) {
                exit('Gagal Mendapatkan Data Pengguna: '.$e->getMessage());
            }

            // Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
        }
    }

}
