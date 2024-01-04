<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php /*検索エンジンにIndexさせないようにする*/?>
    <meta name="robots" content="noindex, nofollow">
    
    <?php /*ページの概要について記載*/?>
    <meta name="description" content="AvailSystemIndexs">
    
    <?php /* OGPタグ */?>
    <?php /* SNSでシェアされた際に、タイトルや説明文、URL、イメージ画像などの詳細な情報を設定するための記述です。 */?>
    <meta property="og:title" content="AvailSystemIndex">
    <meta property="og:description" content="そのうち記載">
    <meta property="og:site_name" content="AvailSystemIndex">
    <meta property="og:url" content="133.18.242.137">
    <meta property="og:image" content="{{ asset('/images/shark.png') }}">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:type" content="ページの種類">
    <meta property="fb:app_id" content="App-ID">
    <meta name="twitter:card" content="summary_large_image">

    <?php /* ファビコン */?>
    <link rel="shortcut icon" type="image/x-icon"  href="{{ asset('/images/favicon.ico') }}">

    <?php /* スマホでホームなどにショートカットを作成したときに表示されるアイコン */?>
    <link rel="apple-touch-icon" href="{{ asset('/images/shark.png') }}" sizes="180x180">

    <?php /* キャッシュの無効化 */?>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>Documents</title>
</head>

<body>
    @php
        $URL="http://133.18.242.137"
    @endphp
    <div>
        <ul>
            <li>
                <a href="{{url('http://133.18.242.137/avail_pdm')}}">pdm</a>
            </li>

        </ul>
        <hr>
        <h6>設定</h6>
        <ul>
            <li>/へaccessすると/var/www/html/.htaccessによりredirect</li>
        </ul>
        <hr>
        <h6>Test</h6>
        <ul>
            <li>
                <a href="{{$URL}}">@php echo $URL @endphp</a>
            </li>
            <li>
                <a href="{{url('/')}}">@php echo url('/') @endphp</a>
            </li>
            <li>
                <a href="{{url('/contact')}}">@php echo url('/contact') @endphp</a>
            </li>
            
        </ul>

    </div>
</body>

</html>
