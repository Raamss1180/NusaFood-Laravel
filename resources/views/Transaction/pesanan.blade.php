<!DOCTYPE html>
<html>
<head>
	<title>Food Ordering Form</title>
	<link rel="stylesheet" href="{{asset('css/Pesanan.css')}}">
	<script src="{{asset('js/DOM.js')}}"></script>
</head>
<body>
	<div class="container">
		<h1>Food Ordering Form</h1>
		<form class="form" action='transaction-proses' method="POST">
        	{{csrf_field()}}
			<label for="nama">Nama:</label><br>
				<input type="text" id="nama" name="nama" required><br>
			<label for="alamat">Alamat:</label><br>
				<input type="text" id="alamat" name="alamat" required><br>
			<label for="no_hp">No HP:</label><br>
				<input type="text" id="no_hp" name="no_hp" required><br>
			<label for="makanan">Pilih Menu:</label><br>
			<select id="makanan" name="menu_id" required>
                <option value="" disabled selected></option>
					@foreach ($tbmenu as $data)
						<option value="{{ $data->id_menu }}" data-harga="{{ $data->harga }}">{{ $data->menu }}</option>
					@endforeach
			</select><br>
			<label for="jumlah">Jumlah:</label><br> 
			<input type="number" id="jumlah" name="jumlah" min="1" required><br>
			<input class="pesanan" type="submit" id="pesanan" name="pesanan" value="pesanan">
			<input type="hidden" name="status" value="succes">
            <a href="index" class="btn" id="kembali">Kembali</a>
		</form>
	</div>
</body>
</html>