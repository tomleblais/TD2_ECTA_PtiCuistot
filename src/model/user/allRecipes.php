<?php

namespace Application\Model\User\AllRecipes;

require_once('src/lib/database.php');
require_once('src/lib/recipe.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Lib\Recipe\Recipe;

class AllRecipeRepository {
    public function getRecipes(): array {
        // Make the query
        $statement = DatabaseConnection::getConnection()->query(
            "SELECT rec_id, rec_title FROM PC_RECIPE WHERE rec_valide = TRUE"
        );

        // Take values
        $recipes = [];
        while (($row = $statement->fetch())) {
            $recipe = new Recipe();
            $recipe->rec_id = $row["rec_id"];
            $recipe->rec_title = $row["rec_title"];

            $recipes[] = $recipe;
        }

        return $recipes;
    }
}