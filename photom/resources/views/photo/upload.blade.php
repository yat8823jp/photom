<form method="POST" action="{{ route( 'photo.store' ) }}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="img_path">
	<button>Upload</button>
</form>
