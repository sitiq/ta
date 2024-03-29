<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:29
 * Description:
 */
//var_dump($bimbinganInfo);
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Bimbingan Mahasiswa</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--berkas mahasiswa-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Mahasiswa yang dibimbing<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($bimbinganInfo))
                        {
                            foreach($bimbinganInfo as $record)
                            {
                        ?>
                        <tr>
                            <td><?php echo $record->nim ?></td>
                            <td><?php echo $record->nama ?></td>
                            <td><?php echo $record->nama_proyek ?></td>
                            <td>
                                <?php if ($record->id_ta != '' and $record->id_sidang == '' and $record->id_yudisium == ''){?>
                                    Judul
                                <?php }elseif ($record->id_ta != '' and $record->id_sidang != '' and $record->id_yudisium == ''){?>
                                    Sidang
                                <?php }else{?>
                                    Yudisium
                                <?php }?>
                            </td>
                            <td>
                                <a href="<?php echo base_url() ?>dosen/bimbingan/detail/<?php echo $record->id_mahasiswa?>" class="btn btn-info"><i class="fa fa-tasks"></i></a>
                            </td>
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
