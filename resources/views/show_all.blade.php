<html>
	<title>
	</title>
	<style type="text/css">
		td {
			border: 1px solid black;
			text-align: center;
		}
	</style>
	<body>
		<a href="{{route('welcome')}}">Trang chủ</a>
		<table style="border: 1px solid black; width:100%">
			<thead>
				<tr>
					<td>Tên loài</td>
					<td>Nguồn phân lập</td>
					<td>Carotenoid<br>ug/g</td>
					<td>beta-carotene<br>ug/g</td>
					<td>Hàm lượng sinh khối<br>g/ml</td>
					<td>Amlyase<br>U/ml</td>
					<td>Cellulase<br>U/ml</td>
					<td>Protease<br>U/ml</td>
					<td>TTC<br>Y/N</td>
					<td>Vùng trình tự định danh</td>
					<td>Trình tự gene định danh</td>
					<td>Vị trí chủng</td>
				</tr>
			</thead>
			<tbody>
				@if(isset($yeasts) && count($yeasts)>0)
					@foreach($yeasts as $yeast)
						<tr>
							<td>{{$yeast->species}}</td>
							<td>{{$yeast->source}}</td>
							<td>{{$yeast->total_carotenoid}}</td>
							<td>{{$yeast->beta_carotene}}</td>
							<td>{{$yeast->biomass}}</td>
							<td>{{$yeast->amylase}}</td>
							<td>{{$yeast->cellulase}}</td>
							<td>{{$yeast->protease}}</td>
							<td>{{$yeast->ttc==1 ? '+' : '-'}}</td>
							<td>{{$yeast->identify}}</td>
							<td>{{$yeast->gene_sequences}}</td>
							<td>{{$yeast->storage_location}}</td>
						</tr>
					@endforeach
				@else
				Không có dữ liệu
				@endif
			</tbody>
		</table>
	</body>
</html>