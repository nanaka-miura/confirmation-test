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
            <form class="header__logout-button" action="/logout" method="post">
                @csrf
                <button>logout</button>
            </form>
            </div>
        </div>
    </header>
    <main>
        <div class="admin__content">
            <div class="admin__heading">
                <h2>Admin</h2>
            </div>
            <form class="search-form" action="/admin/search" post="get">
                @csrf
                <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                <select class="search-form__item-select search-form__item-select--gender" name="gender">
                <option value="" hidden>性別</option>
                <option value="">全て</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="その他">その他</option>
                </select>
                <select class="search-form__item-select search-form__item-select--category" name="category_id">
                    <option value="" hidden>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->content}}</option>
                    @endforeach
                </select>
                <input class="search-form__item-select search-form__item-select--date" type="date" name="date">
                <button class="search-form__item-search" type="submit">検索</button>
                <button class="search-form__item-reset" type="submit" formaction="/admin">リセット</button>
            </form>
            <div class="content__menu">
                <a class="content__menu--export-button" href="{{ route('admin.export', request()->query()) }}">エクスポート</a>

                <div class="content__menu--pagination">{{ $contacts->links('pagination::bootstrap-4') }}</div>
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
                @foreach($contacts as $contact)
                <tr class="inquiry-table__row">
                    <td class="inquiry-table__item">{{$contact['last_name']}}　{{$contact['first_name']}}</td>
                    <td class="inquiry-table__item">{{$contact['gender']}}</td>
                    <td class="inquiry-table__item">{{$contact['email']}}</td>
                    <td class="inquiry-table__item">{{$contact->category_content}}</td>
                    <form action="/contacts/delete" method="post">
                        @method('delete')
                        @csrf
                    <td class="inquiry-table__item">
                        <label for="modalToggle{{$contact['id']}}" class="modal-open-button">詳細</label>
                        <input type="checkbox" id="modalToggle{{$contact['id']}}" class="modal-checkbox">
                            <div class="modal" id="modal{{$contact['id']}}">
                                <div class="modal-wrapper">
                                    <label for="modalToggle{{$contact['id']}}" class="close">&times;</label>
                                    <div class="modal-content">
                                            <input type="hidden" id="">
                                            <div class="detail-content__group">
                                                <span class="detail-content__header">お名前</span>
                                                <input class="detail-content__item" type="text" name="name" value="{{$contact['last_name']}}　{{$contact['first_name']}}" readonly>
                                            </div>
                                            <div class="detail-content__group">
                                                <span class="detail-content__header">性別</span>
                                                <input class="detail-content__item" type="text" name="gender" value="{{$contact['gender']}}" readonly>
                                            </div>
                                            <div class="detail-content__group">
                                                <span class="detail-content__header">メールアドレス</span>
                                                <input class="detail-content__item" type="email" name="email" value="{{$contact['email']}}" readonly>
                                            </div>
                                            <div class="detail-content__group">
                                                <span class="detail-content__header">電話番号</span>
                                                <input class="detail-content__item" type="text" name="tel" value="{{$contact['tel']}}" readonly>
                                            </div>
                                            <div class="detail-content__group">
                                                <span class="detail-content__header">住所</span>
                                                <textarea class="detail-content__item" type="text" rows="2" name="address"readonly>{{$contact['address']}}</textarea>
                                            </div>
                                            <div class="detail-content__group">
                                                <span class="detail-content__header">建物名</span>
                                                <input class="detail-content__item" type="text" name="address-building" value="{{$contact['building']}}" readonly>
                                            </div>
                                            <div class="detail-content__group">
                                                <span class="detail-content__header">お問い合わせの種類</span>
                                                <input class="detail-content__item" type="text" name="category" value="{{$contact->category_content}}" readonly>
                                            </div>
                                            <div class="detail-content__group">
                                                <span class="detail-content__header">お問い合わせ内容</span>
                                                <textarea class="detail-content__item" type="text" name="content" rows="3" readonly>{{$contact['detail']}}</textarea>
                                            </div>
                                            <div class="detail-content__button">
                                                <input type="hidden" name="id" value="{{$contact['id']}}">
                                                <button class="detail-content__button-submit">削除</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </form>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>
</html>