@extends( 'layouts.app' )
@section( 'title', 'Upload' )
@section( 'content' )
<form method="POST" action="{{ route( 'photo.store' ) }}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="img_path">
	<button>Upload</button>
</form>
<a href="{{ route( 'photo.index' ) }}">Back home</a>
@endsection
