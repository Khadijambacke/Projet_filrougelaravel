<div class="login-wrapper">
    <div class="login-card">
        <h2>Connexion</h2>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="remember-me">
                <label>
                    <input type="checkbox" name="remember" />
                    <span>Remember me</span>
                </label>
            </div>

            <div class="form-actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                @endif
                <button type="submit" class="btn-login">Se connecter</button>
            </div>
        </form>

        <div class="divider">ou</div>

        <a href="{{ route('login.google') }}" class="google-btn">
            <img src="{{asset('assets/img/logogoogle.png')}}" style="width:40px">
            Se connecter avec Google
        </a>

        <div class="signup-text">
            Vous n'avez pas de compte ? 
            <a href="{{ route('register') }}">Inscrivez-vous</a>
        </div>
    </div>
</div>

<style>
*, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* PAS de font-size sur html — c'est ça qui causait le "bim" */

.login-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: #f4f4f4;
}

.login-card {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.login-card h2 {
    text-align: center;
    color: #0D5C4A;
    font-size: 22px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group input {
    width: 100%;
    padding: 11px 14px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 16px; /* fixe, pas de clamp */
}

.remember-me {
    font-size: 13px;
    margin-bottom: 10px;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin-top: 5px;
}

.form-actions a {
    font-size: 13px;
    color: #0D5C4A;
    text-decoration: underline;
}

.btn-login {
    background: #0D5C4A;
    color: #fff;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    white-space: nowrap;
}

.btn-login:hover {
    background: #0a4a3a;
}

.divider {
    text-align: center;
    margin: 20px 0;
    font-size: 13px;
    color: #888;
    position: relative;
}

.divider::before,
.divider::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 42%;
    height: 1px;
    background: #e0e0e0;
}
.divider::before { left: 0; }
.divider::after  { right: 0; }

.google-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    font-weight: 500;
    transition: background 0.2s;
    width: 100%;
}

.google-btn:hover { background: #f5f5f5; }

.google-btn img { width: 18px; }

.signup-text {
    margin-top: 15px;
    text-align: center;
    font-size: 14px;
    color: #666;
}

.signup-text a {
    color: #0D5C4A;
    font-weight: 600;
    text-decoration: none;
}

.signup-text a:hover { text-decoration: underline; }

/* UNE seule media query mobile, propre */
@media (max-width: 480px) {
    .login-card {
        padding: 24px 18px;
        border-radius: 12px;
    }

    .form-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .btn-login {
        width: 100%;
        padding: 12px;
        font-size: 15px;
        text-align: center;
    }

    .form-actions a {
        text-align: center;
    }
}
</style>