<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Photo;

class PhotoController extends Controller
{
	public function index()
	{
		$photos = Photo::get();
		return view( 'photo.index', compact( 'photos' ) );
	}

	public function upload( Request $request )
	{
		return view( 'photo.upload' );
	}

	public function store( Request $request )
	{
		$dir = 'photos';

		$img = $request -> file( 'img_path' );


		if( isset( $img ) ) {

			$path = $img -> store( $dir, 'public' );

			if( $path ) {
				Photo::create ( [
					'img_path' => $path,
				] );
			}
		}

		return redirect() -> route( 'photo.index' );
	}

	public function detail( Request $request )
	{
		$detail = Photo::find( $request -> id );
		$storage = Storage::url( $detail -> img_path );

		$meta =  exif_read_data(  "./" . $storage  );

		return view( 'photo.detail', compact( 'detail', 'meta' ) );
	}
}
