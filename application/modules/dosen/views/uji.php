<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:30
 * Description:
 */
//var_dump($pendadaranInfo);
?>
<?php
$id_sidang = '';
$tanggal = '';
$waktu = '';
$ruang = '';
$nim = '';
$nama = '';
$nilai_akhir_sidang = '';
$path = '';


if(!empty($pendadaranInfo))
{
    foreach ($pendadaranInfo as $uf)
    {
        $id_sidang = $uf->id_sidang;
        $tanggal = $uf->tanggal;
        $waktu = $uf->waktu;
        $ruang = $uf->ruang;
        $nim = $uf->nim;
        $nama = $uf->nama;
        $nilai_akhir_sidang = $uf->nilai_akhir_sidang;
        $path = $uf->path;
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Sidang Pendadaran</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--berkas mahasiswa-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Mahasiswa yang akan Diuji<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="product_price">
                        <h1 class="price-tax">Silahkan membuka 'Laporan Tugas Akhir' dengan Foxit PhantomPDF</h1>
                    </div>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Tgl Sidang</th>
                            <th>Jam</th>
                            <th>Ruang</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Laporan TA</th>
                            <th>Penilaian</th>
                            <th>Nilai Akhir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($pendadaranInfo))
                        {
                            foreach($pendadaranInfo as $record)
                            {
                        ?>
                        <tr>
                            <td><?php echo $record->tanggal ?></td>
                            <td><?php echo $record->waktu ?></td>
                            <td><?php echo $record->ruang ?></td>
                            <td><?php echo $record->nim ?></td>
                            <td><?php echo $record->nama ?></td>
                            <td>
                                <a href="<?php echo base_url()?>uploads/sidang/usulan-sidang/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td><a href="dosen_nilaiuji.html" class="btn btn-success btn-sm"><i class="fa fa-tasks"></i></a></td>
                            <td><?php echo $record->nilai_akhir_sidang ?></td>
                        </tr>
                        </tbody>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
