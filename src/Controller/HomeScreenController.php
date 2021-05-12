<?php


namespace App\Controller;


use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeScreenController extends AbstractController
{


    /**
     * @Route("/recipe/add", name="add_new-recipe", methods={"POST"})
     */
    public function addRecipe(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();

        $data= json_decode($request->getContent(), true);

        $newRecipe = new Recipe();
        $newRecipe->setName($data["name"]);
        $newRecipe->setDifficulty("easy");
        $newRecipe->setDescription($data["description"]);
        $newRecipe->setRecipeIngredient($data["recipeIngredient"]);
        $newRecipe->setRecipeInstructions($data["recipeInstructions"]);



        $entityManager ->persist($newRecipe);

        $entityManager->flush();

        return new Response('trying to add recipe..' . $newRecipe->getId());
    }

    /**
     * @Route("/recipe/all", name="get_all_recipe")
     */
    public function getAllRecipe() {
        $recipes = $this->getDoctrine()->getRepository(Recipe::class)->findAll();

        $response = [];

        foreach($recipes as $recipe) {
            $response[] = array(
                'id'=>$recipe->getId(),
                'name' =>$recipe->getName(),
                'description'=>$recipe->getDescription(),
                'recipeIngredient'=>$recipe->getRecipeIngredient(),
                'recipeInstructions'=>$recipe->getRecipeInstructions()
            );

        }

        return $this->json($response);
    }

    /**
     * @Route("/recipe/find/{id}", name="find_a_recipe" )
     */
    public function findRecipe($id) {
        $recipe = $this->getDoctrine()->getRepository(Recipe::class)->find($id);

        $response = [];

        if (!$recipe) {
            throw $this->createNotFoundException(
                'No recipe was found with the id: ' . $id
            );
        } else {
            return $this->json(
                $response[] = array(
                    'id'=>$recipe->getId(),
                    'name' =>$recipe->getName(),
                    'description'=>$recipe->getDescription(),
                    'recipeIngredient'=>$recipe->getRecipeIngredient(),
                    'recipeInstructions'=>$recipe->getRecipeInstructions()
                )
            );
        }
    }

    /**
     * @Route("/recipe/edit/{id}/{name}", name="edit_a_recipe")
     */
    public function editRecipe($id, $name) {
        $entityManager = $this->getDoctrine()->getManager();
        $recipe = $this->getDoctrine()->getRepository(Recipe::class)->find($id);

        if (!$recipe) {
            throw $this->createNotFoundException(
                'No recipe was found with the id: ' . $id
            );
        } else {
            $recipe->setName($name);
            $entityManager->flush();

            return $this->json([
                'message' => 'Edited a recipe with id:' .$id
            ]);
        }
    }

    /**
     * @Route("/recipe/remove/{id}", name="remove_a_recipe")
     */
    public function removeRecipe($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $recipe = $this->getDoctrine()->getRepository(Recipe::class)->find($id);

        if (!$recipe) {
            throw $this->createNotFoundException(
                'No recipe was found with the id: ' . $id
            );
        } else {
            $entityManager->remove($recipe);
            $entityManager->flush();
            return $this->json([
                'message' => 'Removed a recipe with id:' .$id
            ]);
        }

    }
}

