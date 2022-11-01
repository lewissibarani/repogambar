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
                $id = User::where('email', $email)->first();

                if (!empty($id)) {
                    $id = $id->id;
                } else {
                    $newUser = User::create([
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'level' => 4,
                        'nip' => $user->getNip(),
                        'nipbaru' => $user->getNipBaru(),
                        'alamatkantor' => $user->getAlamatKantor(),
                        'golongan' => $user->getGolongan(),
                        'jabatan' => $user->getJabatan(),
                        'profilepicture' => $user->getUrlFoto(),
                        'kodesatker' =>$user->getKodeOrganisasi(),
                        'satker' =>$user->getEselon(),
                        'password' =>Hash::make('pks2022'),
                    ]);
                    $id = $newUser->id;
                }

                // Login dengan menggunakan id pengguna dari record di database aplikasi
                if (Auths::loginUsingId($id)) {
                    return redirect()->intended('/');
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
