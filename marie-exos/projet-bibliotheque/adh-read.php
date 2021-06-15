<?php
include 'functions_custom.php';

$pdo = pdo_connect_mysql();

$pdo_stmt = $pdo->prepare('SELECT * FROM adherent');
$pdo_stmt->execute();

$adherents = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php echo template_header('Read'); ?>

<div class="content read">

	<div><h2>Liste des adhérents de la bibliotheque</h2> 
    <span><a href="adh-create.php" class="add"><i class="fas fa-plus-square fa-xs"></i></a></span></div>

	<table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Nombre de livres empruntés</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adherents as $adherent) : ?>
            <tr>
                <td><?php echo $adherent["id"] ?></td>
                <td><?php echo $adherent["nom"] ?></td>
                <td><?php echo $adherent["prenom"] ?></td>
                <td><?php echo $adherent["nbr_livresempr"] ?></td>
                <td class="actions">
                    <a href="adh-update.php?id=<?php echo $adherent["id"] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="adh-delete.php?id=<?php echo $adherent["id"] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>

<?php echo template_footer(); ?>