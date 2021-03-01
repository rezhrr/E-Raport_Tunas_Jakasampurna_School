<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raport SMA TJS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <img src="assets/foto_tjs/icon/logo_tjs.jpg" style="position:absolute; width: 120px; height: auto;">
    <table style="width: 100% ; text-align: center;">
        <tr>
            <td>
                <span style="line-height: 1.6; font-weight: bold;">
                    LAPORAN HASIL BELAJAR SISWA
                    <br>SEKOLAH MENENGAH ATAS (SMA)
                    <br>TUNAS JAKASAMPURNA
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <?php
    $AmbilData = $this->db->get_where('siswa', ['Email' => $this->session->userdata('Email')])->row_array();
    $queryRaport = "  SELECT * FROM siswa
                    WHERE Email = '$AmbilData[Email]'
                ";
    $Raport = $this->db->query($queryRaport)->result_array();
    ?>




    <table class="table table-borderless">
        <tr>
            <td>
                <label>NIS</label>
            </td>
            <td>
                <?php foreach ($Raport as $R) : ?>
                    <label><?= $R['NIS']; ?></label>
            </td>
            <td>
                <label>Nama Siswa</label>
            </td>
            <td>
                <label><?= $R['Nama_Siswa']; ?></label>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
                <label><?= $R['Email']; ?></label>
            <?php endforeach; ?>
            </td>
            <td>
                <label>Kelas</label>
            </td>
            <td>
                <?php foreach ($Kelas as $K) : ?>
                    <?php if ($K) : ?>
                        <label>
                            <?= $K; ?>
                        </label>
                    <?php endif; ?>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Semester</label>
            </td>
            <td>
                <?php foreach ($Semester as $S) : ?>
                    <?php if ($S) : ?>
                        <label>
                            <?= $S; ?>
                        </label>
                    <?php endif; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <label>Tahun Akademik</label>
            </td>
            <td>
                <?php foreach ($Tahun_Akademik as $TA) : ?>
                    <?php if ($TA) : ?>
                        <label>
                            <?= $TA; ?>
                        </label>
                    <?php endif; ?>
                <?php endforeach; ?>
            </td>
        </tr>
    </table>


    <table class="table table-border table-striped table-earning mt-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Academic</th>
                <th style="word-wrap: break-word;">Task Score 1</th>
                <th style="word-wrap: break-word;">Task Score 2</th>
                <th style="word-wrap: break-word;">Task Score 3</th>
                <th style="word-wrap: break-word;">Mid-Semester Score</th>
                <th style="word-wrap: break-word;">End-Semester Score</th>
                <th style="word-wrap: break-word;">Final Score</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php
            $AmbilData = $this->db->get_where('raport', ['Email' => $this->session->userdata('Email')])->row_array();
            $queryRaport = "  SELECT * FROM raport
                            WHERE Email = '$AmbilData[Email]'
                            ORDER BY Matapelajaran_ID ASC
                        ";
            $Raport = $this->db->query($queryRaport)->result_array();
            ?>
            <?php foreach ($Raport as $R) : ?>
                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td><?= $R['Matapelajaran_ID']; ?></td>
                    <td><?= $R['Nilai_Tugas_1']; ?></td>
                    <td><?= $R['Nilai_Tugas_2']; ?></td>
                    <td><?= $R['Nilai_Tugas_3']; ?></td>
                    <td><?= $R['Nilai_UTS']; ?></td>
                    <td><?= $R['Nilai_UAS']; ?></td>
                    <td><?= $R['Nilai_Akhir']; ?></td>
                    <td><?= $R['Predikat']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <label>Bekasi, <?= changeDateFormat('d-M-Y', time()); ?> </label>
            <br>
            <label>Orang Tua</label>
            <br>
            <br>
            <br>
            <p>____________</p>
        </div>
    </div>
</body>

</html>