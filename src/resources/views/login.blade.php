<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div></div>
            <a class="header__logo" href="/login">
                FashionablyLate
            </a>
            <div class="header__logout-button">
                <a href="/register">register</a>
            </div>
        </div>
    </header>
    <main>
        <div class="login__content">
            <div class="login__heading">
                <h2>Login</h2>
            </div>
            <form class="form" action="/login" method="post">
                @csrf
                <div class="form__group">
                    <span class="form__label">メールアドレス</span>
                    <input class="form__input" type="email" name="email" value="{{old('email')}}" placeholder="例:test@example.com">
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <span class="form__label">パスワード</span>
                    <input class="form__input" type="password" name="password" placeholder="例:coachtech1106">
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">ログイン</button>
                </div>
            </form>
        </div>
</main>
</body>
</html>