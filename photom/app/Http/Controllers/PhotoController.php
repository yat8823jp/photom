<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Photo;

class PhotoController extends Controller
{
	public function index( Request $request )
	{
		$photos = Photo::paginate(20);
		$search = $request -> input( 'search' );
		$query = Photo::query();
		if ( $search ) {
			$spaceConversion   = mb_convert_kana( $search, 's' );
			$wordArraySearched = preg_split( '/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY );
			foreach ( $wordArraySearched as $value ) {
				$query -> where( 'maker', 'like', '%'.$value.'%' );
			}
			$photos = $query -> paginate( 20 );
		}
		return view( 'photo.index', compact( 'photos' ) ) -> with ( [ 'search' => $search ] );
	}

	public function upload( Request $request )
	{
		return view( 'photo.upload' );
	}

	public function store( Request $request )
	{
		$dir = 'photos';

		$img = $request -> file( 'img_path' );

		if ( isset( $img ) ) {

			$path = $img -> store( $dir, 'public' );

			$storage_path = Storage::url( $path );
			$img_meta_data =  exif_read_data(  "." . $storage_path  );
			var_dump( $img_meta_data );
			if( isset( $img_meta_data["Make"] ) ) {
				$img_meta["Make"] = $img_meta_data["Make"];
			} else {
				$img_meta["Make"] = "";
			}
			if( isset( $img_meta_data["Model"] ) ) {
				$img_meta["Model"] = $img_meta_data["Model"];
			} else {
				$img_meta["Model"] = "";
			}
			if( isset( $img_meta_data["ISOSpeedRatings"] ) ) {
				$img_meta["ISOSpeedRatings"] = $img_meta_data["ISOSpeedRatings"];
			} else {
				$img_meta["ISOSpeedRatings"] = "";
			}
			if( isset( $img_meta_data["ExposureTime"] ) ) {
				$img_meta["ExposureTime"] = $img_meta_data["ExposureTime"];
			} else {
				$img_meta["ExposureTime"] = "";
			}
			if( isset( $img_meta_data["ApertureValue"] ) ) {
				$img_meta["ApertureValue"] = $img_meta_data["ApertureValue"];
			} else {
				$img_meta["ApertureValue"] = "";
			}
			if( isset( $img_meta_data["MimeType"] ) ) {
				$img_meta["MimeType"] = $img_meta_data["MimeType"];
			} else {
				$img_meta["MimeType"] = "";
			}


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
