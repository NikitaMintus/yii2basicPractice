<div>
    <ul>

       <?php foreach ($arrayInView as $item) { ?>
           <p>
               <a href="/site/view/<?=$item->id?>"> <?php echo $item->title ?></a>
           </p>
       <?php } ?>

    </ul>
</div>
