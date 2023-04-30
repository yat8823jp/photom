<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
	public function index()
	{
		$photos = Photo::get();
		return view( 'photo.index', compact( 'photos' ) );

		// return view( 'photo.index' );
	}

	public function create( Request $request )
	{
		return view( 'photo.create' );
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
}
