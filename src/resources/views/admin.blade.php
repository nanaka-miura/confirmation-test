<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management screen</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
                <a href="/">logout</a>
            </div>
        </div>
    </header>
    <main>
        <div class="admin__content">
            <div class="admin__heading">
                <h2>Admin</h2>
            </div>
            <form class="search-form">
                <input class="search-form__item-input" type="text" placeholder="名前やメールアドレスを入力してください">
                <select class="search-form__item-select search-form__item-select--gender">
                <option value="" hidden>性別</option>
                <option value=""></option>
                </select>
                <select class="search-form__item-select search-form__item-select--category">
                    <option value="" hidden>お問い合わせの種類</option>
                    <option value=""></option>
                </select>
                <input class="search-form__item-select search-form__item-select--date" type="date">
                <button class="search-form__item-search" type="submit">検索</button>
                <input class="search-form__item-reset" type="reset">
            </form>
            <div class="content__menu">
                <a class="content__menu--export-button" href="">エクスポート</a>
            </div>
            <div class="inquiry-table">
                <table class="inquiry-table__inner">
                <tr class="inquiry-table__row">
                    <th class="inquiry-table__header">お名前</th>
                    <th class="inquiry-table__header">性別</th>
                    <th class="inquiry-table__header">メールアドレス</th>
                    <th class="inquiry-table__header">お問い合わせの種類</th>
                    <th class="inquiry-table__header"></th>
                </tr>
                <tr class="inquiry-table__row">
                    <td class="inquiry-table__item">山田太郎</td>
                    <td class="inquiry-table__item">男性</td>
                    <td class="inquiry-table__item">testt@co.jp</td>
                    <td class="inquiry-table__item">カテゴリ</td>
                    <td class="inquiry-table__item"><label for="modalToggle" class="modal-open-button">詳細</label></td>
                </tr>
                </table>
            </table>
                
<input type="checkbox" id="modalToggle" class="modal-checkbox">
<div class="modal" id="modal">
  <div class="modal-wrapper">
    <label for="modalToggle" class="close">&times;</label>
    <div class="modal-content">
      <h1>Sample</h1>
      <p>This is a sample modal content. <br><br>
        You can place any text or HTML content here.<br><br>
        Modals are useful for displaying information, alerts, or interactive elements without leaving the current page</p>
    </div>
  </div>
</div>

           
        </div>
    </main>
</body>
</html>