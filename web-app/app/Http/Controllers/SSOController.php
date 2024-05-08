<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\UnauthorizedException;

class SSOController extends Controller
{
    public function redirect(Request $request)
    {
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => config('auth.sso_client_id'),
            'redirect_uri' => config('auth.sso_redirect'),
            'response_type' => 'code',
            'scope' => '*',
            'state' => $state,
        ]);

        return redirect(config('auth.sso_url') . '/oauth/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        // $state = $request->session()->pull('state');

        // throw_unless(
        //     strlen($state) > 0 && $state === $request->state,
        //     InvalidArgumentException::class,
        //     'Invalid state value.'
        // );

        $response = Http::asForm()->post(config('auth.sso_url') . '/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => config('auth.sso_client_id'),
            'client_secret' => config('auth.sso_client_secret'),
            'redirect_uri' => config('auth.sso_redirect'),
            'code' => $request->code,
        ]);

        $authTokenData = $response->json();

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => sprintf('%s %s', $authTokenData['token_type'], $authTokenData['access_token']),
        ])->get(config('auth.sso_url') . '/api/profile');

        try {
            $response->throw();

            $payload = $response->json();

            $user = User::where('email', $payload['email'])->first();

            if (!$user) {
                throw new UnauthorizedException('User not found.');
            }

            Session::put('authTokenData', $authTokenData);

            Auth::login($user);

            return redirect()->back();
        } catch (\Throwable $e) {
            // Log the error for debugging purposes
            logger()->error('SSO callback error: ' . $e->getMessage());

            // You can customize the response based on the error
            return back()->withErrors(['error' => 'An error occurred during login. Please try again later.']);
        }
    }

    public function logout(Request $request)
    {
        $authTokenData = Session::get('authTokenData');

        // $response = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'Authorization' => sprintf('%s %s', $authTokenData['token_type'], $authTokenData['access_token']),
        // ])->post(config('auth.sso_url') . '/api/logout');

        Session::flash('authTokenData');

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
