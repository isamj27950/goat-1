
<?php
$title = " GOAT";
$bg = "bg-rose-500";
include('partials/_header.php');
include('models/model.php');
include_once('helpers/pdo.php');
include_once('helpers/functions.php');

// validation du formulaire
// 1-creation de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = false;

// 2-Je vérifie si le formualaire est soumis
if (!empty($_POST['submitted'])) {
    debug_array($_POST);

   // 3- protege contre faille xss
  ///////////////////////////////
  $first_name = trim(htmlspecialchars($_POST['first-name']));
  $last_name = trim(htmlspecialchars($_POST['last_name']));
  $year_of_birth = trim(htmlspecialchars($_POST['year_of_birth']));
  $nationality = trim(htmlspecialchars($_POST['nationality']));
  $company_name = trim(htmlspecialchars($_POST['company_name']));
  $description = trim(htmlspecialchars($_POST['description']));
  $sexe= trim(htmlspecialchars($_POST['sexe']));

 //validate des champs

  //prénom
  if(empty($first_name)){
    $error['first_name'] = $errMsgRequire;
    }elseif (strlen($first_name) < 3 || strlen($first_name) > 50) {
    $error['first_name'] = "<span class='text-red-500'>Le Prénom doit contenir 3 à 50 caractéres</span>";
    }

 // nom
 if(empty($last_name)){
    $error['last_name'] = $errMsgRequire;
    }elseif (strlen($last_name) < 3 || strlen($last_name) > 50) {
    $error['last_name'] = "<span class='text-red-500'>Le Prénom doit contenir 3 à 50 caractéres</span>";
    }

    //entreprise
    if(empty($company_name)){
    $error['compagny_name'] = $errMsgRequire;
    }elseif (strlen($company_name) < 3 || strlen($company_name) > 50) {
    $error['compagny_name'] = "<span class='text-red-500'>Le Prénom doit contenir 3 à 50 caractéres</span>";
    }

    //nationalité
    if(empty($nationality)){
    $error['last_name'] = $errMsgRequire;
    }elseif (strlen($nationality) < 3 || strlen($nationality) > 50) {
    $error['last_name'] = "<span class='text-red-500'>Le Prénom doit contenir 3 à 50 caractéres</span>";
    }


     // age
    // verifie que user a bien rempli le champs
    if (!empty($year_of_birth)) {
        // verifie que l'age est un nombre entier
        if (!is_numeric($year_of_birth)) {
        $error['year_oh_birth'] = "<span class='text-red-500'>Merci de rentrer un age correct</span>";
        // verifie qu'il est majeur
        } elseif ($year_of_birth < 18) {
        $error['year_of_birth'] = "<span class='text-red-500'>Tu es mineur</span>";
         } else {
         $error['year_of_birth'] = $errMsgRequire;
        }
    }
    // description
    if (!empty($description)) {
    $error['description'] = $errMsgRequire;
    }elseif(strlen($description) < 10 || strlen($formation) >300){
    $error['description'] = "<span class='text-red-500'>3 caractères minimum</span>";
    }
}

?>
<!-- creation du formulaire -->

<div class="text-center">
    <form method="POST" >
            <!--  firstname -->
            <div class="form-control  ">
                <label class="label" for="first_name">
                    <span class="label-text font-black">Votre Prénom</span>
                </label>
                <label class="input-group">
                    <span>Prénom</span>
                <input type="text" placeholder="Type here" class="input input-bordered " name="prenom" id ="prenom" />
                <p><?php errorMsg('first_name')?></p>
            </div>
              <!-- lastname -->
            <div class="form-control">
                <label class="label" for="last_name">
                    <span class="label-text font-black"> Votre Nom</span>
                </label>
                 <label class="input-group">
                    <span>Nom</span>
                <input type="text" placeholder="Type here" class="input input-bordered " name="nom" id ="nom" />
                <p><?php errorMsg('last_name')?></p>
            </div>
             <!--  année de naissance -->
             <div class="form-control  ">
                <label class="label" for="year_of_birth">
                    <span class="label-text font-black">Votre Année de naissance</span>
                </label>
                <label class="input-group">
                    <span>Année</span>
                <input type="number" placeholder="" class="input input-bordered " name="age" id ="age" />
                <p><?php errorMsg('age')?></p>
            </div>
                <!--nationalité-->
               <div class="form-control">
                <label class="label"- for="nationality">
                    <span class="label-text font-black">Votre Nationalité</span>
                </label>
                <label class="input-group">
                    <span>Nationalité</span>
                <input type="text" placeholder="Text-here" class="input input-bordered "  />
                </label>
                <p><?php errorMsg('nationality')?></p>
            </div> 
             <!--entreprise-->
             <div class="form-control">
                <label class="label"- for="company_name">
                    <span class="label-text font-black">Votre Entreprise</span>
                </label>
                <label class="input-group">
                    <span>Entreprise</span>
                <input type="text" placeholder="Text-here" class="input input-bordered "  />
                </label>
                <p><?php errorMsg('company_name')?></p>
            </div> 
            <!-- description -->
            <div class="form-control">
                <label class="label"- for="description">
                    <span class="label-text font-black">Votre Description</span>
                </label>
                <label class="input-group">
                    <span>Description</span>
                <input type="text"placeholder="Bio"class="input input-bordered " />
                </label>
                <p><?php errorMsg('company_name')?></p>
            </div> 
                
            <!--  sexe -->
            <?php
            $sexeOptions =[
                ["name" => "Masculin", "checked"=>"checked"],
                ["name" => "Feminin"],
                
            ]
            ?>
            <div class="form-control ">
                    <label class="label">
                        <span class="label-text font-black">Sexe</span>
                    </label>
                    <label class="input-group">
                        <span>Sexe</span>
                        <select class="select select-bordered" name="sexe">
                            <option disabled selected>Sexe</option>
                             <?php foreach ($sexeOptions as $item): ?>
                                <option value="masculin"><?= $item['name']?></option>
                             <?php endforeach ?>
                        </select>
                    </label>
                    <p><?php errorMsg('sexe')?></p>
                </div>
           
            <!-- btn submit -->

            <input type="submit" class="btn btn-active btn-secondary mt-5 font-black" name="submitted"
                value="envoyer"   >

    </form>
</div>
