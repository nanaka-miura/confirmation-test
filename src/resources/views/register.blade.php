<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div></div>
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            <div class="header__logout-button">
                <a href="/login">login</a>
            </div>
        </div>
    </header>
    <main>
        <div class="register__content">
            <div class="register__heading">
                <h2>Register</h2>
            </div>
            <form class="form" action="">
                <div class="form__group">
                    <span class="form__label">お名前</span>
                    <div class="form__error"></div>
                    <input class="form__input" type="text" name="name" placeholder="例:山田 太郎">
                </div>
                <div class="form__group">
                    <span class="form__label">メールアドレス</span>
                    <div class="form__error"></div>
                    <input class="form__input" type="email" name="email" placeholder="例:test@example.com">
                </div>
                <div class="form__group">
                    <span class="form__label">パスワード</span>
                    <div class="form__error"></div>
                    <input class="form__input" type="password" name="password" placeholder="例:coachtech1106">
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">登録</button>
                </div>
            </form>
        </div>
</main>
</body>
</html>