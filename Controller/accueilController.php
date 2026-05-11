<?php

require_once('./Core/db.php');
require_once('./Models/Echantillon.php');

class AccueilController {

    private Echantillon $model;

    public function __construct(PDO $pdo) {

        $this->model = new Echantillon($pdo);
    }


    public function afficher() {

        $result = $this->model->afficher();

        require('./Views/acceuil.php');
        /*
        <?php if (!empty($result)): ?>

    <?php foreach ($result as $row): ?>

        <div>

            <?php foreach ($row as $key => $value): ?>

                <p>
                    <strong><?= $key ?> :</strong>
                    <?= $value ?>
                </p>

            <?php endforeach; ?>

        </div>

        <hr>

    <?php endforeach; ?>

<?php else: ?>

    <p>Aucune donnée</p>

<?php endif; ?>  */
    }

    public function afficherTrierParUrgence(){
        return $this->model->trierParUrgence();
    }

    public function afficherAassignationDesRessources(){
        return $this->model->assignationDesRessources();
    }
}
