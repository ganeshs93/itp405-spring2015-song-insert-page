<?php

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/ArtistQuery.php';
require_once __DIR__ . '/GenreQuery.php';
require_once __DIR__ . '/Song.php';

$song = new Song();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Song</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
    
<body>
    <?php if(!isset($_POST['submit'])) : ?>
        <form action="add-song.php" method="post">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="input_title">Song Title</label>
                    <input type="text" class="form-control" name="song_title" id="input_title">
                </div>
            </div>
            <div class="clearfix visible-lg-block"></div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Artist</label>
                    <select class="form-control" name="artist_name">
                        <?php 
                            $aquery = new ArtistQuery();
                            $artists = $aquery->getAll();
                        ?>
                        <?php foreach($artists as $artist) : ?>
                            <option value="<?php echo $artist->id ?>"><?php echo $artist->artist_name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="clearfix visible-lg-block"></div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Genre</label>
                    <select class="form-control" name="genre">
                        <?php 
                            $gquery = new GenreQuery();
                            $genres = $gquery->getAll();
                        ?>
                        <?php foreach($genres as $genre) : ?>
                            <option value="<?php echo $genre->id ?>"><?php echo $genre->genre ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="clearfix visible-lg-block"></div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="song_price" id="price">
                </div>
            </div>
            <div class="clearfix visible-lg-block"></div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary" name="submit">Insert Song</button>
            </div>
        </form>
    <?php else : ?>
        <?php 
            $song->setTitle($_POST['song_title']);
            $song->setArtistId($_POST['artist_name']);
            $song->setGenreId($_POST['genre']);
            $song->setPrice($_POST['song_price']);
            $song->save();
        ?>
        <p>The song <?php echo $song->getTitle() ?>  with an ID of <?php echo $song->getId() ?>
                was inserted successfully!</p>
    <?php endif ?>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
    
</html>