<!DOCTYPE html>
<html>
<head>
	<title>INPUT ADMIN</title>
</head>

<body>
	<header>
		<h3>ADMIN ONLY</h3>
	</header>

	<form action="createPost.php" method="POST">
		<fieldset>
		<p>
			<label for="judul">Judul: </label>
			<input type="text" name="judul" placeholder="judul" />
		</p>
		<p>
			<label for="url_gambar">Gambar: </label>
			<textarea name="url_gambar"></textarea>
		</p>
		<p>
			<label for="teks">Isi: </label>
			<textarea type="text" name="teks"></textarea>
		</p>
		<p>
			<label for="tanggal">Tanggal: </label>
			<input type="date" name="tanggal" placeholder="tanggal" />
		</p>
		<p>
			<label for="penulis">Penulis: </label>
			<input type="text" name="penulis" placeholder="penulis" />
		</p>
		<p>
			<input type="submit" value="Daftar" name="daftar" />
		</p>
		</fieldset>
	</form>

	</body>
</html>
