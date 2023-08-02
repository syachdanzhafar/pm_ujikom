<html>

<head>
    <title>Pengolaan Peserta</title>
</head>

<body>
    <h2>Pengelolaan Data Peserta</h2>
    <br />
    <a href="data_rekam_medis.php">View Rekammedis</a>
    <br />
    <br />
    <h3>Edit Data</h3>
    <?php
    include 'connection.php';
    $notrans = $_GET['notrans'];
    $sql = "Select * from trekammedis where no_transaksi='$notrans'";
    $data = mysqli_query($conn, $sql);
    while ($r = mysqli_fetch_array($data)) {
        $tgl = explode("-", $r["tgl_berobat"]);
        $bl = intval($tgl[1]);
        $tg = intval($tgl[2]);
    ?>
        <form method="post" action="update.php">
            <table>
                <tr>
                    <td>No Transaksi </td>
                    <td><input type="text" name="notrans" value=<?= $notrans ?>></td>
                </tr>
                <tr>
                    <td>Nama Peserta</td>
                    <td>
                        <select name="nmpeserta">
                            <?php
                            $data = mysqli_query($conn, "select * from
tpeserta");
                            while ($d = mysqli_fetch_array($data)) {
                                if ($r['kd_peserta'] == $d['kd_peserta'])
                                    echo "<option value=" .
                                        $d['kd_peserta'] . " selected='selected'>" . $d['nama_peserta'] . "</option>";
                                else
                                    echo "<option value=" .
                                        $d['kd_peserta'] . ">" . $d['nama_peserta'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tangal</td>
                    <td>
                        <select name="tgl">
                            <?php
                            for ($x = 1; $x <= 31; $x++) {
                                if ($x == $tg)
                                    echo "<option value=$x
selected='selected'> $x </option>";
                                else
                                    echo "<option value=$x> $x
</option>";
                            }
                            ?>
                        </select>
                        Bulan
                        <select name="bln">
                            <?php
                            for ($x = 1; $x <= 12; $x++) {
                                if ($x == $bl)
                                    echo "<option value=$x selected='selected'>
$x </option>";
                                else
                                    echo "<option value=$x> $x </option>";
                            }
                            ?>
                        </select>
                        <label for="thn">Tahun</label>
                        <input type="number" maxlength="4" min="2000" max="2019" id="thn" size="10" name="thn" value="<?= $th; ?>" required />
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>Nama Bidan</td>
                    <td>
                        <select name="nmbidan">
                            <?php
                            $data = mysqli_query($conn, "select * from
tbidan");
                            while ($d = mysqli_fetch_array($data)) {
                                if ($r['kd_bidan'] == $d['kd_bidan'])
                                    echo "<option value=" .
                                        $d['kd_bidan'] . " selected='selected'>" . $d['nama_bidan'] . "</option>";
                                else
                                    echo "<option value=" .
                                        $d['kd_bidan'] . ">" . $d['nama_bidan'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Keluhan</td>
                    <td><input type="text" name="keluhan" value="<?= $r['keluhan'] ?>"></td>
                </tr>
                <tr>
                <tr>
                    <td>Biaya Administrasi</td>
                    <td><input type="number" name="biayaadm" value="<?= $r['biaya_admin'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan" /><input type="reset" value="Ulang" />
                    </td>
                </tr>
            </table>
        <?php
    };
        ?>
        </form>
</body>

</html>
>