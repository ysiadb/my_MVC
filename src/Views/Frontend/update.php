<?php 

/**
* @var $user \App\Entity\Author
* @var $post \App\Entity\Post[]
*/


foreach($post as $item){
    echo $item->getTitre(); 

    echo '
    <div>
        <form method="post" action="" enctype="multipart/form-data">
            <p>
                <label value="Title">Titre: </label><input type="text" name="titre" value="'. $item->getTitre() . '"></input>
            </p>
            <p>
                <label value ="Content">Contenu : </label></br>
                <textarea name = "texte" rows= "10" cols= "60">'. $item->getTexte(). '</textarea>
            </p>
            <figure class="figure" style="background-image: url('.$item->getImage() . '); width:50px; height:50px; ">
            </figure>
            <input type="file" name="uploadedFile" required>
            <p>
                <input type="submit" name="uploadBtn" value="Mettre à jour" ></input>
            </p>
        </form>
    </div>
    '; 
}
?>