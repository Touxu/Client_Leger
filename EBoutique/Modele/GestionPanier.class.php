<?php

include("panier.class.php");

class GestionPanier {

        public static function GetLePanier() {
        $lePanier = null;
        if (isset($_SESSION['panier']))
        {
            $lePanier = unserialize($_SESSION['panier']);
        }
        return $lePanier;
        }

        public static function getVide()
        {
        $retour = true;
        if (isset($_SESSION['panier']))
        {
            if(count(unserialize($_SESSION['panier'])->Produits) > 0)
            {
            $retour = false;
            }
        }

        return $retour;
        }

        public static function getNbrProduit()
        {
            $lePanier = GestionPanier::GetLePanier();
            $leNbrProduit = 0;
            if ($lePanier != null)
            {
                $leTabDesProds = $lePanier->Produits;
                for ($index = 0; $index < count($leTabDesProds); $index++)
                {
                    $leNbrProduit += $leTabDesProds[$index]->QuantitéeDansPanier;
                }
            }
            return $leNbrProduit;
        }


        public static function getProduits()
        {
        if (isset($_SESSION['panier']))
        {
            $lePanier = unserialize($_SESSION['panier']);
        }
        return $lePanier->Produits;
        }

        public static function getunproduits($num)
        {
            if (isset($_SESSION['panier']))
        {
            $lePanier = $_SESSION['panier'];
            $tabProduits = $panier->Produits;
            $leProduit;
            foreach ($tabProduits as $produit)
            {
                if($produit->NumProd == $num)
                {
                    $leProduit = $produit;
                }
            }
        }
        // retourne un objet produit du panier dont idProduit=$num
        return $leProduit;
        }


    public static function AjouterProduitPanier($leProduit, $qt) {
        if (isset($_SESSION['panier']))
        {
        $panier = unserialize($_SESSION['panier']); //on récupère l'objet panier

        $tabProduits = $panier->Produits;

        //On vérifie si le produit est déja dans la panier.
        //Si oui, on ne le rajoute pas mais on incrémente de 1 la quantitée du produit.
        $EtaitDeja = false;
        $index = 0;
        while($index < ( count($tabProduits) - 1) && $leProduit->NumProd != $tabProduits[$index]->NumProd)
        { $index ++;}

        if($leProduit->NumProd == $tabProduits[$index]->NumProd) //Si il est déja dedans, on incrémente la quantitée.
        {
            $tabProduits[$index]->QuantitéeDansPanier += $qt;
        }
        else //Sinon on l'ajoute au panier.
        {
            $leProduit->QuantitéeDansPanier += $qt - 1; // Vue qu'on ajoute le produit il faut lui soustraire 1
            $tabProduits[] = $leProduit;

        }


        $panier->Produits = $tabProduits;

        $_SESSION['panier'] = serialize($panier); //on ajoute le panier dans la session
        }
        else
        {
        $panier = new Panier(); //création du panier
        $tabProduits = array();
        $leProduit->QuantitéeDansPanier = $qt;
        $tabProduits[] = $leProduit;
        $panier->Produits = $tabProduits;

        $_SESSION['panier'] = serialize($panier); //on ajoute le panier dans la session
        }
    }

    public static function DecrementerProduitPanier($leProduit) {
        $panier = unserialize($_SESSION['panier']); //on récupère l'objet panier

        $tabProduits = $panier->Produits;

        //modification panier
        $index = 0;
        while($index < ( count($tabProduits) - 1) && $leProduit->NumProd != $tabProduits[$index]->NumProd)
        { $index ++;}
        if($leProduit->NumProd == $tabProduits[$index]->NumProd) //Quand on le trouve.
        {
            if($tabProduits[$index]->QuantitéeDansPanier > 1) //on test si le produit existera enccore après la décrémentation
            {
            $tabProduits[$index]->QuantitéeDansPanier --;
            }
            else //Sinon on le suprimme
            {
                array_splice($tabProduits, $index, 1);
            }
        }

        $panier->Produits = $tabProduits;

        $_SESSION['panier'] = serialize($panier); //on ajoute le panier dans la session
    }

    public static function SuprimmerProduitPanier($leProduit) {
        $panier = unserialize($_SESSION['panier']); //on récupère l'objet panier

        $tabProduits = $panier->Produits;

        //modification panier
        $index = 0;
        while($index < ( count($tabProduits) - 1) && $leProduit->NumProd != $tabProduits[$index]->NumProd)
        { $index ++;}
        if($leProduit->NumProd == $tabProduits[$index]->NumProd) //Quand on le trouve.
        {
            array_splice($tabProduits, $index, 1);
        }

        $panier->Produits = $tabProduits;

        $_SESSION['panier'] = serialize($panier); //on ajoute le panier dans la session
    }


    public static function IncrementerProduitPanier($leProduit) {
        $panier = unserialize($_SESSION['panier']); //on récupère l'objet panier

        $tabProduits = $panier->Produits;

        //modification panier
        $index = 0;
        while($index < ( count($tabProduits) - 1) && $leProduit->NumProd != $tabProduits[$index]->NumProd)
        { $index ++;}
        if($leProduit->NumProd == $tabProduits[$index]->NumProd) //Quand on le trouve.
        {
            $tabProduits[$index]->QuantitéeDansPanier ++;
        }

        $panier->Produits = $tabProduits;

        $_SESSION['panier'] = serialize($panier); //on ajoute le panier dans la session
    }


    public static function vider() //
    {
            $panier = $_SESSION['panier']; //on récupère l'objet panier
            unset($panier->Produits);
            $_SESSION['panier'] = $panier; //on ajoute le panier dans la session
    }

    public static function SupprimerProduit($num) //on supprime un produit identifié par $num
    {
        if (isset($_SESSION['panier']))
        {
            $lePanier = $_SESSION['panier'];
            $tabProduits = $panier->Produits;
            for ($i=0; $i < count($tabProduits); $i++)
            {
                 if($tabProduits[i] == $num)
                {
                unset($tabProduits[i]);
                }
            }
            $panier->Produits =  $tabProduits;
            $_SESSION['panier'] = $panier; //on ajoute le panier dans la session
        // supprime une produit identifiée par $num dans le tableau des produits
    }
}

}