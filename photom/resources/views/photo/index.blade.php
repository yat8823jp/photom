@extends( 'layouts.app' )
@section( 'title', 'Top page' )
@section( 'content' )
<h1>Photos data</h1>
@if( $photos )
	<ul class="flex flex-wrap gap-2">
		@foreach ( $photos as $photo )
			<li class="w-1/4">
				<a href="{{ route( 'photo.detail', ['id'=>$photo->id] ) }}" class="block">
					<img src="{{ Storage::url( $photo -> img_path ) }}">
				</a>
			</li>
		@endforeach
	</ul>
@endif
<a href="{{ route( 'photo.upload' ) }}">Create photo</a>
@endsection
