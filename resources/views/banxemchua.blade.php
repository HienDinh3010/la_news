<?php
$kq = DB::select("SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, 
   loaitin.Ten as TenLT FROM tin, loaitin
	WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 AND tin.lang=? 
   ORDER BY rand() DESC LIMIT 0, 3", array($lang));
?>

<aside class="widget widget-rating-posts">
        <h4 class="widget-title">Bạn xem chưa</h4>
        <?php foreach ($kq as $row ) {?>
        <article class="entry">
          <div class="entry__img-holder">
            <a href="<?=URL::to("/tin/{$row->idTin}");?>">
              <div class="thumb-container thumb-60">
                <img data-src="<?=$row->urlHinh?>" class="entry__img lazyload" alt="" onerror="this.src='img/defaultimg.jpg'">
              </div>
            </a>
          </div>

          <div class="entry__body">
            <div class="entry__header">
              
              <h2 class="entry__title">
                <a href="#"><?=$row->TieuDe?></a>
              </h2>
              <ul class="entry__meta">
                <li class="entry__meta-date">
                    <?=date('d/m/Y',strtotime($row->Ngay))?>
                </li>
              </ul>
            </div>
          </div>
        </article>
        <?php }?>

        <article class="entry">
          <div class="entry__img-holder">
            <a href="single-post.html">
              <div class="thumb-container thumb-60">
                <img data-src="img/content/review/review_post_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
              </div>
            </a>
          </div>

          <div class="entry__body">
            <div class="entry__header">
              
              <h2 class="entry__title">
                <a href="single-post.html">4 credit card tips to make business travel easier</a>
              </h2>
              <ul class="entry__meta">
                <li class="entry__meta-author">
                  <span>by</span>
                  <a href="#">DeoThemes</a>
                </li>
                <li class="entry__meta-date">
                  Jan 21, 2018
                </li>
              </ul>
              <ul class="entry__meta">
                <li class="entry__meta-rating">
                  <i class="ui-star"></i><!--
                  --><i class="ui-star"></i><!--
                  --><i class="ui-star"></i><!--
                  --><i class="ui-star"></i><!--
                  --><i class="ui-star-empty"></i>
                </li>
              </ul>
            </div>
          </div>
        </article>
      </aside> 