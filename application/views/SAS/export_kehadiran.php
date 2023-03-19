<?php
// fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// membuat nama file ekspor "export-to-excel.xls"
header("Content-Disposition: attachment; filename= data_kehadiran " . $m . "/" . $y . ".xls");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <thead style="background-color: #9ED2E9 ;">
            <tr class="text-center">
                <th>No.</th>
                <th>Nama</th>
                <th>NIS</th>

                <?php

                $a_tgl = 1;
                $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                while ($a_tgl <= $jml_tgl) {

                ?>
                    <th><?= $a_tgl ?></th>
                <?php
                    $tgl_h[$a_tgl] = array();
                    $tgl_t[$a_tgl] = array();
                    $tgl_i[$a_tgl] = array();
                    $tgl_s[$a_tgl] = array();
                    $tgl_a[$a_tgl] = array();
                    $a_tgl++;
                }
                ?>
                <th class="bg-success">Hadir</th>
                <th class="bg-warning">Terlambat</th>
                <th class="bg-secondary">Izin</th>
                <th class="bg-primary">Sakit</th>
                <th class="bg-danger">Alpha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if ($data_siswa) {
                foreach ($data_siswa as $siswa) {
                    $nis = $siswa->NIS;
                    // array keteranga
                    $jml_h[$nis] = array();
                    $jml_t[$nis] = array();
                    $jml_i[$nis] = array();
                    $jml_s[$nis] = array();
                    $jml_a[$nis] = array();

            ?>
                    <tr class="text-center">
                        <td><?= $no++ ?>.</td>
                        <th width="200px"><?= $siswa->NAMA ?></th>
                        <td><?= $siswa->NIS ?></td>
                        <?php
                        $a_tgl = 1;
                        $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                        while ($a_tgl <= $jml_tgl) {
                            $hadir = $this->model_SAS->getPerDay_hadir($y . '-' . $m . '-' . $a_tgl, $siswa->NIS);
                            if (empty($hadir)) {
                                if($a_tgl > date('d')){
                                    echo '<th></th>';
                                }else{
                                    echo '<th>' . 'A' . '</th>';
                                    $jml_a[$siswa->NIS][$a_tgl] = 1;
                                    $tgl_a[$a_tgl][$siswa->NIS] = 1;
                                }
                            } else {




                                if ($hadir->STATUS == 'H') {
                                    echo '<th>' . $hadir->STATUS .'-'.'AP'. '</th>';
                                    // echo '<th><a href="#tambah" data-toggle="modal" class="btn"  title="Keterangan Hadir" onclick="edit_data_pelanggaran(' . $hadir->ID . ')">' .  $hadir->STATUS . ' ' . $hadir->PELANGGARAN . '</a></th>';
                                    $jml_h[$siswa->NIS][$a_tgl] = 1;
                                    $tgl_h[$a_tgl][$siswa->NIS] = 1;
                                } elseif ($hadir->STATUS == 'T') {
                                    echo '<th>' . $hadir->STATUS . '</th>';
                                    $jml_t[$siswa->NIS][$a_tgl] = 1;
                                    $tgl_t[$a_tgl][$siswa->NIS] = 1;
                                } elseif ($hadir->STATUS == 'I') {
                                    echo '<th>' . 'I-BV' . '</th>';
                                    $jml_i[$siswa->NIS][$a_tgl] = 1;
                                    $tgl_i[$a_tgl][$siswa->NIS] = 1;
                                } elseif ($hadir->STATUS == 'IV') {
                                    echo '<th>' . 'I' . '</th>';
                                    $jml_i[$siswa->NIS][$a_tgl] = 1;
                                    $tgl_i[$a_tgl][$siswa->NIS] = 1;
                                } elseif ($hadir->STATUS == 'S') {
                                    echo '<th>' . $hadir->STATUS . '</th>';
                                    $jml_s[$siswa->NIS][$a_tgl] = 1;
                                    $tgl_s[$a_tgl][$siswa->NIS] = 1;
                                } elseif ($hadir->STATUS == 'A') {
                                    echo '<th>' . $hadir->STATUS . '</th>';
                                    $jml_a[$siswa->NIS][$a_tgl] = 1;
                                    $tgl_a[$a_tgl][$siswa->NIS] = 1;
                                } elseif ($hadir->STATUS == 'P') {
                                    $tes = $this->model_SAS->jmlGetPerDay_hadir($y . '-' . $m . '-' . $a_tgl, $siswa->NIS);
                                    //TANPA HADIR        
                                    if (count($tes) == 1) {
                                        echo '<th>' . $hadir->STATUS . '-' . 'AS' . '</th>';
                                    } else {
                                        echo '<th>' . 'H' . '</th>';
                                        $jml_h[$siswa->NIS][$a_tgl] = 1;
                                        $tgl_h[$a_tgl][$siswa->NIS] = 1;
                                    }
                                    // echo '<th><a href="#tambah" data-toggle="modal" class="btn"  title="Keterangan Hadir" onclick="edit_data_pelanggaran(' . $hadir->ID . ')">' .  $hadir->STATUS . ' ' . $hadir->PELANGGARAN . '</a></th>';
                                    
                                }else{
                                    echo '<th>' . 'A' . '</th>';
                                    $jml_a[$siswa->NIS][$a_tgl] = 1;
                                    $tgl_a[$a_tgl][$siswa->NIS] = 1;
                                }
                            }
                            $a_tgl++;
                        }
                        ?>
                        <td><?= array_sum($jml_h[$siswa->NIS]) ?></td>
                        <td><?= array_sum($jml_t[$siswa->NIS]) ?></td>
                        <td><?= array_sum($jml_i[$siswa->NIS]) ?></td>
                        <td><?= array_sum($jml_s[$siswa->NIS]) ?></td>
                        <td><?= array_sum($jml_a[$siswa->NIS]) ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr class="text-right bg-success">
                <th colspan="3">Jml Hadir</th>
                <?php
                $a_tgl = 1;
                $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                while ($a_tgl <= $jml_tgl) {

                ?>
                    <th><?= array_sum($tgl_h[$a_tgl]) ?></th>
                <?php
                    $a_tgl++;
                }
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="text-right bg-warning">
                <th colspan="3">Jml Terlambat</th>
                <?php
                $a_tgl = 1;
                $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                while ($a_tgl <= $jml_tgl) {

                ?>
                    <th><?= array_sum($tgl_t) ?></th>
                <?php
                    $a_tgl++;
                }
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="text-right bg-secondary">
                <th colspan="3">Jml Izin</th>
                <?php
                $a_tgl = 1;
                $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                while ($a_tgl <= $jml_tgl) {

                ?>
                    <th><?= array_sum($tgl_i[$a_tgl]) ?></th>
                <?php
                    $a_tgl++;
                }
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="text-right bg-primary">
                <th colspan="3">Jml Sakit</th>
                <?php
                $a_tgl = 1;
                $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                while ($a_tgl <= $jml_tgl) {

                ?>
                    <th><?= array_sum($tgl_s[$a_tgl]) ?></th>
                <?php
                    $a_tgl++;
                }
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="text-right bg-danger">
                <th colspan="3">Jml Alpha</th>
                <?php
                $a_tgl = 1;
                $jml_tgl = date('t', strtotime('1-' . $m . '-' . $y));
                while ($a_tgl <= $jml_tgl) {

                ?>
                    <th><?= array_sum($tgl_a[$a_tgl]) ?></th>
                <?php
                    $a_tgl++;
                }
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>