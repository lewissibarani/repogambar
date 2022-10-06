<?php

namespace App\Http\Controllers\Auth;
use \JKD\SSO\Client\Provider\Keycloak;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function actionSso()
    {
         /** Implement SSO Dec 2020 */
        $provider = new Keycloak([
            'authServerUrl'         => 'https://sso.bps.go.id',
            'realm'                 => 'pegawai-bps',
            'clientId'              => '03200-simrad-97h',
            'clientSecret'          => 'bed2e9b7-896e-489d-b3ab-0fed95d673b4',
            'redirectUri'           => 'http://localhost:81/simbrs2/web/site/sso'
            //'redirectUri'           => 'http://localhost/site/sso'
        ]);
        
        if(!isset($_GET['code'])){
            $authUrl = $provider->getAuthorizationUrl();
            $_SESSION['oauth2state'] = $provider->getState();
            header('Location: '.$authUrl);
            exit;
        }else if(empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
            unset($_SESSION['oauth2state']);
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
                
                $searchUser = \app\models\User::find()->where(['username'=>$user->getUsername()])->one();

                $modelUser = new \app\models\User();
                $modelUser->name = $user->getName();
                $modelUser->email = $user->getEmail();
                $modelUser->username = $user->getUsername();
                $modelUser->level = 4;
                $modelUser->nip = $user->getNip();
                $modelUser->nipbaru = $user->getNipBaru();
                $modelUser->alamatkantor = $user->getAlamatKantor();
                $modelUser->golongan = $user->getGolongan();
                $modelUser->jabatan = $user->getJabatan();
                $modelUser->profilepicture = $user->getUrlFoto();
                $modelUser->satker = $user->getEselon();
                $salt = $this->generateSalt();
                $modelUser->salt = $salt;
                $modelUser->password = $this->hashPassword($salt, 'pks2022');
                if(!$searchUser)
                {
                    $modelUser->save();
                    Yii::$app->user->login($modelUser);
                }else{
                    $usr = \app\models\User::findOne($searchUser->id);
                    Yii::$app->user->login($usr);
                }
                return $this->redirect(['login']);
            } catch (\Exception $e) {
                exit('Gagal Mendapatkan Data Pengguna: '.$e->getMessage());
            }

            // Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
        }
    }

}
