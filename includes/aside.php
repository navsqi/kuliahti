<aside class="col-md-4">
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h3 class="panel-title">Komentar Terbaru</h3>
    	</div>
    	<div class="panel-body latest-comments">
    		<ul>
                <?php 

                    $queryKomentar = mysqli_query($conn,"SELECT * FROM komentar WHERE status = 1");
                    while($rowKomentar = mysqli_fetch_assoc($queryKomentar)){

                 ?>

    		    <li><a href="index.php?detail=<?php echo $rowKomentar['artikel_id']; ?>"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 
                    <strong><?php echo $rowKomentar['user']; ?></strong>: <?php echo $rowKomentar['reply']; ?></a></li>

                <?php

                    }

                ?>
    		</ul>
    	</div>
    </div>
</aside>

<aside class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Artikel Lain</h3>
        </div>
        <div class="panel-body latest-comments">
            <ul>
                <?php 

                    $queryArtikel = mysqli_query($conn,"SELECT * FROM artikel WHERE status = 1 ORDER BY rand() LIMIT 4");
                    while($rowArtikel = mysqli_fetch_assoc($queryArtikel)){

                 ?>

                <li><a href="index.php?detail=<?php echo $rowArtikel['id_artikel']; ?>"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> 
                    <?php echo $rowArtikel['judul']; ?></a></li>

                <?php

                    }

                ?>
            </ul>
        </div>
    </div>
</aside>


