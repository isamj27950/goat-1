<?php
$title = " GOAT";
$bg = "bg-rose-500";
include('partials/_header.php');
include('models/model.php');
include_once('helpers/pdo.php');

$goat = get('goat');

?>
<main class="px-20 py-20">
<div class="card  text-center p-8 flex-shrink-0 w-full max-w-sm bg-base-200 shadow-xl">
    <figure><img src="<?=$goat['url_img'] ?>"alt= "movie" /></figure>
    <div class="card-body">
        <p class="text-5xl font-bold "><?= $goat['first_name'] ,$goat['last_name']?></p>
        <p class="">Année de naissance: <?= $goat['year_of_birth']?></p>
        <p class="">Nationalité: <?= $goat['nationality']?></p> 
        <p class="">Entreprise: <?= $goat['company_name']?><p>
        <p class="">Description: <?= $goat['description']?><p>
        <p class="">Sexe: <?= $goat['sexe']?><p>  
            <div class="mt-10 text-center">
             <a class="btn btn-info ">modifier</a>
             <a  href="delete.php?id=<?=$goat['id']?>"class="btn btn-active btn-error">supprimer</a>
            </div>
    </div>
</diV>
</main>                           

<!-- footer -->
<?php
include('partials/_footer.php')
?>
