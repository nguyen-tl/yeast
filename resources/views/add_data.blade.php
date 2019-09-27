<html>
	<title></title>
	<body>
		<a href="{{route('welcome')}}">Trang chủ</a>
		<form action="{{route('add-data')}}" method="post">
			@csrf
			Tên loài: <input type='text' name='species'><br><br>
			Nguồn phân lập: <input type='text' name='source'><br><br>
			Carotenoid(ug/g): <input type='text' name='total_carotenoid'><br><br>
			beta-carotene(ug/g): <input type='text' name='beta_carotene'><br><br>
			Hàm lượng sinh khối(g/ml): <input type='text' name='biomass'><br><br>
			Amlyase(U/ml) : <input type='text' name='amylase'><br><br>
			Cellulase(U/ml): <input type='text' name='cellulase'><br><br>
			Protease(U/ml): <input type='text' name='protease'><br><br>
			TTC(Y/N): <select name='ttc'>
				<option value="1">Y</option>
				<option value="0">N</option>
			</select><br><br>
			Vùng trình tự định danh: <input type='text' name='identify'><br><br>
			Trình tự gene định danh: <input type='text' name='gene_sequences'><br><br>
			Vị trí chủng: <input type='text' name='storage_location'><br><br>
			<input type="submit" name="submit" value="Thêm">
		</form>
	</body>
</html>