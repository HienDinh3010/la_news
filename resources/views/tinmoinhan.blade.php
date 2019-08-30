<div class="trending-now">
    <span class="trending-now__label">
        <i class="ui-flash"></i>
        <span class="trending-now__text d-lg-inline-block d-none">Mới nhận</span>
    </span>
    <div class="newsticker">
        <ul class="newsticker__list">
        <?php 
        $kq = DB::select("SELECT idTin,TieuDe, Ngay FROM tin  
        WHERE idTL=22 LIMIT 0, 3");
        ?>
        <?php foreach ($kq as $row ) {?>
                
        <li class="newsticker__item"><a href="#" class="newsticker__item-url"><?=$row->TieuDe;?></a></li>
        <?php }//foreach?>

        
        </ul>
    </div>
    <div class="newsticker-buttons">
        <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-left"></i></button>
        <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-right"></i></button>
    </div>
</div>