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

			$storage = Storage::url( $path );
			$img_meta =  exif_read_data(  "." . $storage  );
			var_dump( $img_meta );

			if( $path ) {
				Photo::create ( [
					'img_path'        => $path,
					'maker'           => $img_meta["Make"],
					'model'           => $img_meta["Model"],
					'ISOSpeedRatings' => $img_meta["ISOSpeedRatings"],
					'ExposureTime'    => $img_meta["ExposureTime"],
					'ApertureValue'   => $img_meta["ApertureValue"],
					'MimeType'        => $img_meta["MimeType"]
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
