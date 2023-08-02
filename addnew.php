<?php
	include "connection.php";
	$sql1 	= "SELECT*FROM tpeserta";
	$result1	= $conn->query($sql1);
	
    $sql2 = "SELECT*FROM tbidan";
    $result2 = $conn->query($sql2);

?>

<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Form Tambah Rekam Medis</title>
</head>

<body>
    <form method="post" action="save.php" class="mt-5">
        <table width="80%" border="0" cellpadding="5">
            <tr>
                <th width="31%" scope="row"><div align="left">Nomor Transaksi</div></th>
                    <td width="69%"><label for="no_transaksi"></label>
                    <input type="text" name="no_transaksi" id="no_transaksi" required="required" /></td>
            </tr>
            <tr>
                <th scope="row">
                    <div align="left">
                        <label for="nama_peserta">Nama Peserta</label>
                    </div>
                </th>
                    <td>
                        <select name="nama_peserta">
                            <?php
                            while($row1=$result1->fetch_assoc())
                            {
                                echo "<option
                                value=".$row1["kd_peserta"].">".$row1["nama_peserta"]."</option>";
                            }
                            ?>
                        </select>
                    </td>
            </tr>
            <tr>
                <th scope="row">
                    <div align="left">
                        <label for="tgl_berobat">Tanggal Berobat</label>
                    </div>
                </th>
                    <td>
                        <select name="tgl_berobat">
                            <?php for ($t=1;$t<=31;$t++)
                            {
                                echo "<option value=$t>$t</option>";
                            }
                            ?>
                        </select>
                            <label for="bln">Bulan</label>
                        <select name="bln" id="bln">
                            <?php
                            $nmbulan = array ("--Pilih Bulan--
                            ","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Novem
                            ber","Desember");
                            for($b=0;$b<=12;$b++)
                            {
                                echo"<option value=$b>$nmbulan[$b]</option>";
                            }
                            ?>
                        </select>
                    <label for="thn">Tahun</label>
                    <input type="number" maxlength="4" min="2000" max="2023" id="thn" size="10" name="thn" required/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                            <div align="left">
                                <label for="nama_bidan">Nama Bidan</label>
                            </div>
                    </th>
                    <td>
                    <select name="nama_bidan">
                        <?php
                        while($row2=$result2->fetch_assoc())
                        {
                        echo "<option
                        value=".$row2["kd_bidan"].">".$row2["nama_bidan"]."</option>";
                        }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><div align="left">Keluhan</div></th>
                    <td>
                        <label for="keluhan"></label>
                        <input type="text" name="keluhan" id="keluhan" required />
                    </td>
                </tr>
                <tr>
                <th scope="row"><div align="left">Biaya Administrasi</div></th>
                    <td><label for="biaya_admin"></label>
                        <input type="number" name="biaya_admin" id="biaya_admin" required />
                    </td>
                    </tr>
                <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="Simpan" /><input type="reset" value="Clear" />
                </td>
                </tr>
        </table>
    </form>
</body>
</html>