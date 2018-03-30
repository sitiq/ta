<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:32
 * Description:
 */
//var_dump($pesanInfo);
//var_dump($revisiInfo);
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pemberitahuan<small>Kegiatan terakhir</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled timeline">
                        <?php
                        if(!empty($pesanInfo))
                        {
                            foreach($pesanInfo as $record)
                            {
                            ?>
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="" class="tag">
                                        <span><?php echo substr($record->createdDtm,0,10) ?></span>
                                    </a>
                                    <span class="label label-warning"><?php echo substr($record->createdDtm,10,6) ?></span>
                                </div>
                                <div class="block_content">
                                    <h2 class="title">
                                        <a><?php echo $record->nama ?></a>
                                    </h2>
                                    <div class="byline">
                                        <span></span>
                                    </div>
                                    <p class="excerpt well"><?php echo $record->deskripsi ?></p>
                                </div>
                            </div>
                        </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
