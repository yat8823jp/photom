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
							{{ $meta[ "Make" ] }}
						</td>
					</tr>
					<tr>
						<td>モデル</td>
						<td>
							{{ $meta[ "Model" ] }}
						</td>
					</tr>
					<tr>
						<td>ISO</td>
						<td>
							{{ $meta[ "ISOSpeedRatings" ] }}
						</td>
					</tr>
					<tr>
						<td>シャッタースピード</td>
						<td>
							{{ $meta[ "ExposureTime" ] }}
						</td>
					</tr>
					<tr>
						<td>絞り</td>
						<td>
							{{ $meta[ "ApertureValue" ] }}
						</td>
					</tr>
					<tr>
						<td>Mine Type</td>
						<td>
							{{ $meta[ "MimeType" ] }}
						</td>
					</tr>
				</tbody>
			</table>
		</figcaption>
	</figure>
@endif
@endsection
