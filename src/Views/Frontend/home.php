<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */
?>


<h3> POST(S) </h3><? 
// var_dump($posts); 

foreach($posts as $post){
        echo $post['titre'] . '<br>' . $post['texte'] . '<br>' . $post['date'] . '<br><br>'; 

    // for($i = 0; $i < count($posts); $i++){
    //  echo $posts[$i]; 
    // }
}

?>