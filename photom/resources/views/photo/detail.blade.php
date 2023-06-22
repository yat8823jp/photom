@extends( 'layouts.app' )
@section( 'title', 'Detail page' )
@section( 'content' )
<h1>Photo detail data</h1>
@if( $detail )
{{ var_dump( $meta ) }}
	<figure class="flex gap-2">
		<img src="{{ Storage::url( $detail -> img_path ) }}" width="25%">
		<p></p>
		<figcaption>
			<table>
				<thead>
					<th>
						<td>項目</td>
						<td>内容</td>
					</th>
				</thead>
				<tbody>
					<tr>
						<td>メーカー</td>
						<td>
							<?php if ( isset ( $meta[ "Make" ] ) ) echo $meta[ "Make" ] ?>
						</td>
					</tr>
					<tr>
						<td>モデル</td>
						<td>
							<?php if ( isset ( $meta[ "Model" ] ) ) echo $meta[ "Model" ] ?>
						</td>
					</tr>
					<tr>
						<td>ISO</td>
						<td>
							<?php if ( isset ( $meta[ "ISOSpeedRatings" ] ) ) echo $meta[ "ISOSpeedRatings" ] ?>
						</td>
					</tr>
					<tr>
						<td>シャッタースピード</td>
						<td>
							<?php if ( isset ( $meta[ "ExposureTime" ] ) ) echo $meta[ "ExposureTime" ] ?>
						</td>
					</tr>
					<tr>
						<td>絞り</td>
						<td>
							<?php if ( isset ( $meta[ "ApertureValue" ] ) ) echo $meta[ "ApertureValue" ] ?>
						</td>
					</tr>
					<tr>
						<td>Mine Type</td>
						<td>
							<?php if ( isset ( $meta[ "MimeType" ] ) ) echo $meta[ "MimeType" ] ?>
						</td>
					</tr>
				</tbody>
			</table>
		</figcaption>
	</figure>
@endif
@endsection
