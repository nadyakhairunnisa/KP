function konfirmasi_reset()
{
	var konfirmasi = confirm("apakah anda yakin ingin mereset data ?")
	
	if (konfirmasi == true)
	{
		return true;
	}	
	else
	{
		return false;
	}
}

function konfirmasi_hapus()
{
	var konfirmasi = confirm("Hapus Data?")
	
	if (konfirmasi == true)
	{
		return true;
	}

	else
	{
		return false;
	}
}

function konfirmasi_kirim()
{
	var konfirmasi = confirm("Kirim Data?")

	if (konfirmasi == true)
	{
		return true;
	}

	else
	{
		return false;
	}
}

/*function konfirmasi_judul()
{
	document.getElementById('subject').innerHTML = 'isi judul dengan benar';
}

function konfirmasi_artikel()
{
	document.getElementById('category').innerHTML = 'pilih salah satu kategori';
}

function konfrimasi_konten()
{
	document.getElementById('content').innerHTML = 'silahkan isi konten';
}*/

function daftar_artikel()
{
	form = document.form_artikel;
	var sukses = true;

	if (form.judul.value == '')
	{	
		alert('Wajib mengisi judul!');
		sukses = false;
		return false;
	}

	/*if (form.kabupaten.value == '')
	{
		alert('Wajib mengisi kabupaten!');
		sukses = false;
		return false;
	}

	if (form.kategori.value == '')
	{
		alert('Wajib mengisi kategori!');
		sukses = false;
		return false;
	}*/

	if (form.konten.value == '')
	{
		alert('Wajib mengisi konten!');
		sukses = false;
		return false;
	}

	if (sukses == true)
	{
		document.getElementById('judul').innerHTML = 'judul artikel : ' + form.judul.value;
		/*document.getElementById('kabupaten').innerHTML = 'kabupaten artikel : ' + form.kabupaten.value;
		document.getElementById('kategori').innerHTML = 'kategori  artikel : ' + form.kategori.value;*/
		document.getElementById('konten').innerHTML = 'isi artikel : ' + form.konten.value;

		return false;
	}
}

function daftar_komentar()
{
	form = document.form_artikel;
	var sukses = true;

	if (form.nama.value == '')
	{	
		alert('Wajib mengisi nama!');
		sukses = false;
		return false;
	}

	if (form.email.value == '')
	{	
		alert('Wajib mengisi email!');
		sukses = false;
		return false;
	}

	if (form.konten.value == '')
	{
		alert('Wajib mengisi konten!');
		sukses = false;
		return false;
	}

	if (sukses == true)
	{
		document.getElementById('nama').innerHTML = 'Nama : ' + form.nama.value;
		document.getElementById('email').innerHTML = 'Email : ' + form.email.value;
		document.getElementById('konten').innerHTML = 'Isi komentar : ' + form.konten.value;

		return false;
	}
}