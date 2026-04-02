<div class="register-wrapper">
    <div class="register-card">
        <h2>Inscription</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <x-input-label for="name" :value="__('Nom complet')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="form-group">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="form-actions">
                <a href="{{ route('login') }}">Déjà inscrit ?</a>
                <button type="submit" class="btn-register">S'inscrire</button>
            </div>
        </form>

        <div class="divider">ou</div>

        <a href="{{ route('login.google') }}" class="google-btn">
            <img src="{{ asset('assets/img/logogoogle.png') }}" style="width:18px;">
            S'inscrire avec Google
        </a>

        <div class="signup-text">
            Vous avez déjà un compte ?
            <a href="{{ route('login') }}">Connectez-vous</a>
        </div>
    </div>
</div>

<style>
*, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.register-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: #f4f4f4;
}

.register-card {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.register-card h2 {
    text-align: center;
    color: #0D5C4A;
    font-size: 22px;
    margin-bottom: 20px;
}

.form-group { margin-bottom: 15px; }

.form-group input {
    width: 100%;
    padding: 11px 14px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 16px;
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

.btn-register {
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

.btn-register:hover { background: #0a4a3a; }

.divider {
    text-align: center;
    margin: 20px 0;
    font-size: 13px;
    color: #888;
    position: relative;
}

.divider::before, .divider::after {
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

@media (max-width: 480px) {
    .register-card {
        padding: 24px 18px;
        border-radius: 12px;
    }
    .form-actions {
        flex-direction: column;
        align-items: stretch;
    }
    .btn-register {
        width: 100%;
        padding: 12px;
        font-size: 15px;
        text-align: center;
    }
    .form-actions a { text-align: center; }
}
</style>