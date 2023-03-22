<?php
$title = "Liste GOAT";
$bg = "bg-rose-500";
include('partials/_header.php');
include('models/model.php');
include_once('helpers/pdo.php');


$goats = getAll('goat','id');

?>
<main class="px-20 py-20">

    <!-- affichage du tableau -->

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full"
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Nationalité</th>
                <th>Entreprise</th>
                <th>Voir</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($goats as $goat){ ?>
                <tr>
                    <th><?= $goat['id'] ?></th>
                    <td><?= $goat['first_name']."".$goat['last_name'] ?></td>  
                    <td><?= $goat['nationality'] ?></td>
                    <td><?= $goat['company_name'] ?></td>
                    <td>
                    <a href="show-goat.php?id=<?=$goat['id']?>&name=<?=$goat['first_name']?>">
                    <i class="fa-solid fa-eye text-sky-300"></i>
                    </a>
                <?php
             }   ?> 
            </tbody>
        </table>
    </div>
</main>

<!-- footer -->
<?php
include('partials/_footer.php')
?>

