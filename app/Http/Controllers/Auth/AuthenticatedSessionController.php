<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

     /**
     * Determina la ubicación basada en la dirección IP.
     */
   
    public function store(LoginRequest $request): RedirectResponse
    {   
        function ipEnRango($ip, $rangoInicio, $rangoFin) {
            $ipNumerica = ip2long($ip);
            $rangoInicioNumerica = ip2long($rangoInicio);
            $rangoFinNumerica = ip2long($rangoFin);
        
            if ($ipNumerica >= $rangoInicioNumerica && $ipNumerica <= $rangoFinNumerica) {
                return true;
            } else {
                return false;
            }
        }
        
            $ipEnviada = $request->input('direccion_ip'); // Obtén la dirección IP del formulario

        // Aquí puedes usar $ubicacion según tus necesidades (por ejemplo, almacenarla en la sesión)

                $rangoCasaInicio        = "192.168.1.1";
				$rangoCasaFin           = "192.168.1.255";

				$rangoSalinaSedeInicio  = "192.168.10.1";
				$rangoSalinaSedeFin     = "192.168.10.255";

				$rangoAdmonInicio       = "192.168.21.1";
				$rangoAdmonFin          = "192.168.21.255";

				$rangoMovilInicio       = "192.168.19.1";
				$rangoMovilFin          = "192.168.19.255";

				$rangoPquePlataInicio   = "192.168.11.1";
				$rangoPquePlataFin      = "192.168.11.255";

				$rangoFlorestaInicio    = "192.168.12.1";
				$rangoFlorestaFin       = "192.168.12.255";

				$rangoSalinasInicio     = "192.168.20.1";
				$rangoSalinasFin        = "192.168.20.255";

				$rangoAtlántidaInicio   = "192.168.13.1";
				$rangoAtlántidaFin      = "192.168.13.255";

				$rangoPandoInicio       = "192.168.30.1";
				$rangoPandoFin          = "192.168.30.255";

				$rangoSuarezInicio      = "192.168.15.1";
				$rangoSuarezFin         = "192.168.15.255";

				$rangoToledoSedeInicio  = "192.168.17.1";
				$rangoToledoSedeFin     = "192.168.17.255";

				$rangoBBlancosInicio    = "192.168.18.1";
				$rangoBBlancosFin       = "192.168.18.255";

				$rangoSJacintoInicio    = "192.168.22.1";
				$rangoSJacintoFin       = "192.168.22.255";

				$rangoTalaInicio        = "192.168.16.1";
				$rangoTalaFin           = "192.168.16.255";

				$rangoBBlancoSedeInicio = "192.168.18.1";
				$rangoBBlancoSedeFin    = "192.168.18.255";

				if (ipEnRango($ipEnviada, $rangoCasaInicio, $rangoCasaFin)) {
					$ipEnviada = "Ofic. de Desarrollo";
				}elseif(ipEnRango($ipEnviada, $rangoSalinaSedeInicio, $rangoSalinaSedeFin)){
					$ipEnviada = "Salinas Sede";
				}elseif(ipEnRango($ipEnviada, $rangoAdmonInicio, $rangoAdmonFin)){
					$ipEnviada = "Administración";
				}elseif(ipEnRango($ipEnviada, $rangoMovilInicio, $rangoMovilFin)){
					$ipEnviada = "Móviles";
				}elseif(ipEnRango($ipEnviada, $rangoPquePlataInicio, $rangoPquePlataFin)){
					$ipEnviada = "Parque del Plata";
				}elseif(ipEnRango($ipEnviada, $rangoFlorestaInicio, $rangoFlorestaFin)){
					$ipEnviada = "Floresta";
				}elseif(ipEnRango($ipEnviada, $rangoSalinasInicio, $rangoSalinasFin)){
					$ipEnviada = "Salinas";
				}elseif(ipEnRango($ipEnviada, $rangoAtlántidaInicio, $rangoAtlántidaFin)){
					$ipEnviada = "Atlántida";
				}elseif(ipEnRango($ipEnviada, $rangoPandoInicio, $rangoPandoFin)){
					$ipEnviada = "Pando";
				}elseif(ipEnRango($ipEnviada, $rangoSuarezInicio, $rangoSuarezFin)){
					$ipEnviada = "Suarez";
				}elseif(ipEnRango($ipEnviada, $rangoToledoSedeInicio, $rangoToledoSedeFin)){
					$ipEnviada = "Toledo Sede";
				}elseif(ipEnRango($ipEnviada, $rangoBBlancosInicio, $rangoBBlancosFin)){
					$ipEnviada = "Barros Blancos";
				}elseif(ipEnRango($ipEnviada, $rangoSJacintoInicio, $rangoSJacintoFin)){
					$ipEnviada = "San Jacinto";
				}elseif(ipEnRango($ipEnviada, $rangoTalaInicio, $rangoTalaFin)){
					$ipEnviada = "Tala";
				}elseif(ipEnRango($ipEnviada, $rangoBBlancoSedeInicio, $rangoBBlancoSedeFin)){
					$ipEnviada = "Barros Blancos Sede";
				}else {
					return Redirect::route('login')->with('error', 'Estas en un rango de direcciones IP no valido');
				}

                session(['datosIP' => $ipEnviada]);
                //dd($ipEnviada);

        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
