-- 1
Liste des produits :
SELECT * FROM `article` WHERE 1

Liste des produits en rupture de stock (dont la quantité est “0”) 
SELECT * FROM `article` WHERE 1 AND StockMagasin=0

Liste des commandes d’aujourd’hui classées par n° décroissant 
SELECT IDCommande FROM `commande` WHERE dateCommande = CURRENT_DATE ORDER BY IDCommande DESC

Liste des commandes créées depuis les 10 derniers jours   
SELECT * FROM commande WHERE DateCommande >= (CURRENT_DATE - 10)

SELECT * FROM commandes WHERE date BETWEEN CURRENT_DATE - INTERVAL 10 day AND CURRENT_DATE

-- 2
Liste des produits (nom, quantité et prix unitaire nécessaire) de la commande 1  
SELECT article.name, price, quantite FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle WHERE IDCommande = 1

Prix total de chaques commandes
-- SELECT SUM(price) AS totalPrice FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle WHERE IDCommande
SELECT IDCommande, SUM(price) AS totalPrice FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle GROUP BY IDCommande

Montant total de l’ensemble des commandes faites aujourd’hui
-- SELECT idCommande, SUM(price * quantite) FROM article INNER JOIN commandeadproduit ON commandeadproduit.idArticle = commandeadproduit.idCommande WHERE CURRENT_DATE
-- SELECT SUM(price * quantite) AS totalPrice FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle WHERE DateCommande = CURRENT_DATE
-- SELECT SUM(price * quantite) FROM article INNER JOIN commandeadproduit ON article.idArticle = commandeadproduit.idArticle WHERE CURRENT_DATE
SELECT SUM(price * quantite) FROM article INNER JOIN commandeadproduit ON article.idArticle = commandeadproduit.idArticle INNER JOIN commande ON commandeadproduit.IDCommande = commande.IDCommande WHERE DateCommande = CURRENT_DATE

Liste des commandes dont le prix est entre 100 et 550 euros 
-- SELECT IDCommande, SUM(price) AS totalPrice FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle GROUP BY IDCommande(totalPrice>100 AND totalPrice<500)
-- SELECT IDCommande, SUM(price * quantite) AS totalPrice FROM article INNER JOIN commandeadproduit ON article.idArticle = commandeadproduit.idArticle INNER JOIN commande ON commandeadproduit.IDCommande = commande.IDCommande WHERE totalPrice BETWEEN 100 AND 500
-- SELECT commande.IDCommande, SUM(Price * quantite) AS total FROM article INNER JOIN commandeadproduit ON article.idArticle = commandeadproduit.idArticle INNER JOIN commande ON commandeadproduit.IDCommande = commande.IDCommande WHERE Price BETWEEN 100 AND 550 GROUP BY IDCommande
-- SELECT IDCommande, SUM(Price * quantite) AS total FROM article INNER JOIN commandeadproduit ON article.idArticle = commandeadproduit.idArticle WHERE Price BETWEEN 100 AND 550 GROUP BY IDCommande
SELECT IDCommande, SUM(Price * quantite) AS total FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle GROUP BY IDCommande HAVING total BETWEEN '100' AND '550'

Liste des commandes de Charlize’
-- SELECT IDCommande FROM commande INNER JOIN user ON commande.IDUser = cuser.IDUser GROUP BY IDCommande WHERE prenom LIKE Charlize
-- SELECT IDCommande FROM commande INNER JOIN user ON commande.IDUser = cuser.IDUser GROUP BY IDCommande WHERE user.name LIKE Charlize;
-- Attention classement toujours à la fin !!!!!!
SELECT IDCommande FROM commande INNER JOIN user ON commande.IDUser = user.IDUser WHERE user.Name LIKE 'Charlize' GROUP BY IDCommande
SELECT IDCommande FROM commande INNER JOIN user ON commande.IDUser = user.IDUser WHERE user.Name LIKE 'Charlize'

Nombre de commandes par client 
-- SELECT COUNT(IDCommande)FROM commande INNER JOIN user ON commande.IDUser = user.IDUser WHERE user GROUP BY IDUser
-- SELECT COUNT(IDCommande)FROM commande INNER JOIN user ON commande.IDUser = user.IDUser WHERE user.Name GROUP BY user.IDUser
-- SELECT IDUser, SUM(IDUser) FROM `commande` WHERE IDCommande
-- SELECT IDUser, SUM(IDUser) FROM `commande` GROUP BY IDUser;
SELECT IDUser, COUNT(IDUser) FROM `commande` GROUP BY IDUser

Somme des montants de commandes par client
-- SELECT commande.IDCommande, SUM(price) AS totalPrice FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle INNER JOIN commande ON commande.IDCommande = article.IDCommande INNER JOIN user ON user.IDUser = commande.IDUser  GROUP BY IDUser
-- SELECT commande.IDCommande, SUM(price) AS totalPrice FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle INNER JOIN commande ON commandeadproduit.IDCommande = commande.IDCommande INNER JOIN user ON user.IDUser = commande.IDUser GROUP BY user.IDUser
SELECT commande.IDUser, SUM(price) AS totalPrice FROM article INNER JOIN commandeadproduit ON article.IDArticle = commandeadproduit.IDArticle INNER JOIN commande ON commandeadproduit.IDCommande = commande.IDCommande INNER JOIN user ON user.IDUser = commande.IDUser  GROUP BY user.IDUser

-- 3
Créer une commande de 3 articles différent (avec ses lignes de commande associées)
-- Dans la table commande
-- INSERT INTO `commande`(`IDCommande`, `DateCommande`, `IDUser`) VALUES (NULL,CURRENT_DATE,3);
-- INSERT INTO `commande`(`IDCommande`, `DateCommande`, `IDUser`) VALUES (NULL,CURRENT_DATE,3);
-- INSERT INTO `commande`(`IDCommande`, `DateCommande`, `IDUser`) VALUES (NULL,CURRENT_DATE,3);
-- Dans la table commandeadproduit
INSERT INTO `commande`(`IDCommande`, `DateCommande`, `IDUser`) VALUES (NULL,CURRENT_DATE,3)

INSERT INTO `commandeadproduit`(`idCommandeAdProduit`, `Quantite`, `IDCommande`, `IDArticle`) VALUES (NULL,1,11,8);
INSERT INTO `commandeadproduit`(`idCommandeAdProduit`, `Quantite`, `IDCommande`, `IDArticle`) VALUES (NULL,1,11,14);
INSERT INTO `commandeadproduit`(`idCommandeAdProduit`, `Quantite`, `IDCommande`, `IDArticle`) VALUES (NULL,1,11,18)

Ajouter un produit avec sa catégorie et sa quantité
INSERT INTO `article`(`IDArticle`, `name`, `description`, `Price`, `Image`, `Poids`, `StockMagasin`, `enVente`, `Categorie`) VALUES (NULL,'l\'\'informatique pour les nulls','Débutez et devenez un pro rapidement !',19,'https://images-na.ssl-images-amazon.com/images/I/51r+usQhjAL._SX346_BO1,204,203,200_.jpg',540,12,1,1);

Ajouter 100 à la quantité en stock d‘un produit 
UPDATE article SET StockMagasin = StockMagasin + 100 WHERE IDArticle = 1

Augmenter de 5% le prix des produits d’une catégorie donnée
UPDATE article SET Price = Price * 1.05 WHERE article.Categorie = 3

Supprimer un article
DELETE FROM `article` WHERE IDArticle = 19

Supprimer les clients qui n’ont pas de commande
-- création : INSERT INTO `user`(`IDUser`, `Name`, `LastName`, `Adress`, `Postcode`, `City`) VALUES (NULL,'Eva','Green','14 rue de la République',73000,'Chambéry')
DELETE FROM `user` WHERE `IDUser` NOT IN (SELECT IDUser FROM `commande`)

-- 4
Liste des clients ayant passé une commande aujourd’hui
SELECT `IDUser`, `Name`, `LastName`, `Adress`, `Postcode`, `City` FROM `user` WHERE `IDUser` IN (SELECT IDUser FROM `commande` WHERE DateCommande = CURRENT_DATE)

Montant de la valeur du stock (somme des articles)
SELECT SUM(article.StockMagasin * article.Price) FROM `article`













