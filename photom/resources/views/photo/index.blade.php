<h1>Photos data</h1>
@if( $photos )
	@foreach ( $photos as $photo )
		<img src="{{ Storage::url( $photo -> img_path ) }}" width="25%">
	@endforeach
@else
	<p>No photo data</p>
@endif
