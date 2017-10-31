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

function konfirmasi_ubah()
{
	var konfirmasi = confirm("Apakah Anda yakin ingin mengubah data ini?")

	if (konfirmasi == true)
	{
		return true;
	}

	else
	{
		return false;
	}
}

