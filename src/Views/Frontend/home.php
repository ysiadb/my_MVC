<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

if(count($posts) !== 0 ){
    echo '<h3 class="display-6"> Tous les posts </h3>'; 
}
else {
    echo '<h3 class="display-6"> Il n\'y a pas de posts, <a href="/dashboard">créer le premier !</a> </h3>'; 
}

echo '<div class="row row-cols-1 row-cols-md-4 g-4">'; 

foreach($posts as $post){
    echo '
    <div class="col">
    <div class="card">
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"> Post<br> n° ' . $post->getId(). '</span>
    <figure class="figure" style="background-image: url('.$post->getImage() . ')">
    </figure>

    <div class="card-body">

        <h5 class="card-title">'.$post->getTitre() .'</h5>
        <p class="card-text">'.$post->getTexte() .'</p>

        <a href="/update/'. $post->getId() .'" class="btn btn-outline-dark">Update</a>
        <a href="/delete/'. $post->getId() .'" class="btn btn-outline-dark">Supprimer</a>

        </div>
        <div class="card-footer">
            <small class="text-muted">Le ' . $post->getDate() . ' par <i>' . $post->getAuthor()->getPseudo().'</i></small>
        </div>
        <p>Commenter </p>
    </div>
    </div>'; 

}
echo '</div>'; 
?>
