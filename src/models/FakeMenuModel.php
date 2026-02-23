<?php

function getMenus() {
    return [

        1 => [
            'id' => 1,
            'name' => 'Menu Noël Tradition',
            'theme' => 'Noël',
            'regime' => 'Classique',
            'description' => "Un menu festif qui célèbre les saveurs classiques de Noël avec des produits nobles et une touche bordelaise.",
            'price' => 55,
            'min_people' => 6,
            'stock' => 8,
            'conditions' => "Commande 2 semaines minimum avant la prestation. Conserver au réfrigérateur à 4°C maximum.",
            'entree' => "Foie gras maison et chutney de figues",
            'entree_allergenes' => "Gluten • Sulfites",
            'plat' => "Chapon rôti aux marrons, jus corsé",
            'plat_allergenes' => "Fruits à coque",
            'dessert' => "Bûche pâtissière chocolat-framboise",
            'dessert_allergenes' => "Gluten • Lait • Œufs",
            'image' => "/projet-traiteur/public/images/menu-noel.jpg"
        ],

        2 => [
            'id' => 2,
            'name' => 'Menu Pâques Printanier',
            'theme' => 'Pâques',
            'regime' => 'Végétarien',
            'description' => "Un menu frais et coloré célébrant le renouveau du printemps avec des légumes de saison et des saveurs délicates.",
            'price' => 42,
            'min_people' => 4,
            'stock' => 12,
            'conditions' => "Commande 10 jours avant la prestation. Consommer dans les 24h après livraison.",
            'entree' => "Œuf mollet, crème d’asperges vertes",
            'entree_allergenes' => "Œufs • Lait",
            'plat' => "Risotto primavera aux légumes croquants",
            'plat_allergenes' => "Lait",
            'dessert' => "Nid de Pâques, mousse chocolat blanc",
            'dessert_allergenes' => "Lait • Œufs • Gluten",
            'image' => "/projet-traiteur/public/images/menu-paques.jpg"
        ],

        3 => [
            'id' => 3,
            'name' => 'Le Bordelais Classique',
            'theme' => 'Classique',
            'regime' => 'Classique',
            'description' => "Un voyage au cœur de la gastronomie bordelaise, entre canelés et entrecôte, accompagné des meilleurs crus locaux.",
            'price' => 48,
            'min_people' => 2,
            'stock' => 20,
            'conditions' => "Commande 5 jours avant la prestation. Stockage au frais obligatoire.",
            'entree' => "Huîtres du Bassin d'Arcachon (6 pièces)",
            'entree_allergenes' => "Crustacés • Mollusques",
            'plat' => "Entrecôte bordelaise, sauce au vin rouge",
            'plat_allergenes' => "Sulfites",
            'dessert' => "Canelé bordelais et crème anglaise",
            'dessert_allergenes' => "Gluten • Lait • Œufs",
            'image' => "/projet-traiteur/public/images/menu-bordelais.jpg"
        ],

        4 => [
            'id' => 4,
            'name' => 'Soirée Prestige',
            'theme' => 'Événement',
            'regime' => 'Classique',
            'description' => "Un menu d’exception pour vos événements les plus marquants. Cocktail, dîner et mignardises pour une soirée inoubliable.",
            'price' => 75,
            'min_people' => 10,
            'stock' => 5,
            'conditions' => "Commande 3 semaines avant. Prêt de matériel inclus (vaisselle, nappes). Restitution sous 10 jours ouvrés.",
            'entree' => "Mise en bouche : verrines trilogie de la mer",
            'entree_allergenes' => "Crustacés • Poisson • Mollusques",
            'plat' => "Filet de bœuf Wellington, légumes glacés",
            'plat_allergenes' => "Gluten • Lait • Œufs",
            'dessert' => "Assiette de mignardises & pièce montée",
            'dessert_allergenes' => "Gluten • Lait • Œufs • Fruits à coque",
            'image' => "/projet-traiteur/public/images/soiree-prestige.jpg"
        ],

        5 => [
            'id' => 5,
            'name' => 'Le Végétal Gourmand',
            'theme' => 'Classique',
            'regime' => 'Végan',
            'description' => "Un menu 100% végétal qui prouve que la gastronomie sans produit animal peut être aussi raffinée que savoureuse.",
            'price' => 38,
            'min_people' => 4,
            'stock' => 15,
            'conditions' => "Commande 7 jours avant. Conservation au frais.",
            'entree' => "Tartare de betteraves et avocat, croustillant de sarrasin",
            'entree_allergenes' => "Gluten",
            'plat' => "Curry thaï de légumes, lait de coco et riz basmati",
            'plat_allergenes' => "",
            'dessert' => "Fondant chocolat noir et coulis de fruits rouges",
            'dessert_allergenes' => "Gluten",
            'image' => "/projet-traiteur/public/images/le-vegetal-gourmand.jpg"
        ],

    ];
}

function getMenuById($id) {
    $menus = getMenus();
    return $menus[$id] ?? null;
}
