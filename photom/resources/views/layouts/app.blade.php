<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield( 'title' )</title>
	@yield( 'styles' )
	@vite( [ 'resources/scss/app.scss', 'resources/js/app.js' ] )
</head>
<body>
<header class="l-header">
	<nav class="p-nav">
		<p><a class="logo" href="/">Stocker</a></p>
		<form method="GET" action="{{ route( 'photo.index' ) }}">
			<input type="text" placeholder="Search" name="search" value="@if ( isset( $search ) ) {{ $search }} @endif">
			<input type="submit" value="search">
		</form>
		<ul class="p-nav__list">
			@if( Auth::check() )
				<li><span>ようこそ, {{ Auth::user() -> name }} さん</span></li>
				<li>
					<a href="#" id="logout">ログアウト</a>
					{{-- <form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" style="display: none;"> --}}
						@csrf
					</form>
				</li>
			@else
				{{-- <li><a href="{{ route( 'login' ) }}">ログイン</a></li>
				<li><a href="{{ route( 'register' ) }}">会員登録</a></li> --}}
			@endif
			<li>test</li>
		</ul>
	</nav>
</header>
<main>
	@yield( 'content' )
</main>
@if( Auth::check() )
	<script>
		document.getElementById( 'logout' ).addEventListener( 'click', function( event ) {
		event.preventDefault();
		document.getElementById( 'logout-form' ).submit();
		} );
	</script>
@endif
@yield( 'scripts' )
</body>
</html>
