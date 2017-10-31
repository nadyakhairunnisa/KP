<?php 
	require_once("connect.php");
	if (!isset($_SESSION)) {
		session_start();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Contoh Aplikasi Shopping Cart</title>
	<style>
		h1, h2, h3, p {
			margin-top:0px;
			margin-bottom:10px;
		}
		header{
			padding: 50px;
			text-align: center;
			font-family: "AR ESSENCE";
			background: #ffff00;
			background: -moz-linear-gradient( center top, #ffffff 20%, #ff9900 100% );
			background: -webkit-gradient( linear, left top, left bottom, color-stop(.2, #ffffff), color-stop(1, #ff9900) );
		}

	</style>
</head>
<body>
	<header><h1>APLIKASI SHOPPING CART BOOK-COMMERCE</h1></header><hr /><br>
	
	<h2>List Produk</h2><br>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr valign="top">
			<td width="40%">
			<table width="100%" border="0" cellspacing="0"
				cellpadding="0">
			<?php
				mysqli_select_db($conn, $database_conn);
				$query = mysqli_query ($conn, "select * from barang");
				while ($rs = mysqli_fetch_assoc ($query)) {
					?>
						<tr>
							<td width="160" valign="top"><img src="<?php echo $rs['gambar']; ?>"
								alt="" style="width:140px; margin-right:20px; margin-bottom:20px;" /></td>
							<td valign="top"><h3><?php echo $rs['nama']; ?></h3>
								<p><?php echo $rs['deskripsi']; ?></p>
								<p>Harga : <?php echo number_format($rs['harga']); ?> - <a href="cart.php?act=add&amp;barang_id=<?php 
									echo $rs['id']; ?>&amp;ref=index.php">Beli</a></p></td>
						</tr>
						<?php
				}
			?>
			</table></td>
			<td>&nbsp;</td>
			<td width="55%"><p>Keranjang Anda</p>
			<hr />
				<?php require("cart_view.php"); ?></td>
			</tr>
	</table>
	<p>&nbsp;</p>
	
</body>
</html>