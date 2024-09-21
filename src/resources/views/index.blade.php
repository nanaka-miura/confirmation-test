@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text form__input--text--last-name">
                    <input type="text" name="last_name" placeholder="例:山田" value="{{old('last_name')}}">
                    <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
                </div>
                <div class="form__input--text form__input--text--first-name">
                    <input type="text" name="first_name" placeholder="例:太郎" value="{{old('first_name')}}">
                    <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" name="gender" value="男性">男性
                    <input type="radio" name="gender" value="女性">女性
                    <input type="radio" name="gender" value="その他">その他
                    <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text form__input--text--mail">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{old('email')}}">
                    <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text form__input--text--tel1">
                    <input type="tel" name="tel1" placeholder="080" value="{{old('tel1')}}">
                    <div class="form__error">
                    @error('tel1')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class=form__input--text--tel--hyphen>ー</div>
                <div class="form__input--text form__input--text--tel2">
                    <input type="tel" name="tel2" placeholder="1234" value="{{old('tel2')}}">
                    <div class="form__error">
                    @error('tel2')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class=form__input--text--tel--hyphen>ー</div>
                <div class="form__input--text form__input--text--tel3">
                    <input type="tel" name="tel3" placeholder="5678" value="{{old('tel3')}}">
                    <div class="form__error">
                    @error('tel3')
                    {{ $message }}
                    @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text form__input--text--address">
                    <input type="text" name="address" placeholder="東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
                    <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item no-asterisk">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text form__input--text--address">
                    <input type="text" name="building" placeholder="千駄ヶ谷マンション101" value="{{old('building')}}">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select name="category_id">
                        <option value="" hidden>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" cols="30" rows="5" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
                    <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection