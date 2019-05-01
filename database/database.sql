DROP TABLE IF EXISTS `panier`;

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `piscine_test`.`utilisateur` (
	`utilisateur_nom` VARCHAR(255) NOT NULL,
	`utilisateur_prenom` VARCHAR(255) NOT NULL,
	`utilisateur_email` VARCHAR(255) NOT NULL,
	`utilisateur_pseudo` VARCHAR(255) NOT NULL,
	`utilisateur_mdp` VARCHAR(255) NOT NULL,
	`utilisateur_photo` VARCHAR(255) NULL,
	`utilisateur_type` VARCHAR(8) NOT NULL,
	`utilisateur_vendeur_photofond` VARCHAR(255) NULL,
	`utilisateur_acheteur_adresse` VARCHAR(255) NULL,
	`utilisateur_acheteur_cb` INT NULL,
	PRIMARY KEY (`utilisateur_email`)
) ENGINE = INNODB;

DROP TABLE IF EXISTS `item`;
CREATE TABLE `piscine_test`.`item` (
	`item_id` INT NOT NULL AUTO_INCREMENT,
	`item_titre` VARCHAR(255) NOT NULL,
	`item_prix` INT NOT NULL,
	`item_description` TEXT NULL ,
	`item_photo` VARCHAR(255) NULL ,
	`item_video` VARCHAR(255) NULL,
	`item_qte_stock` INT NOT NULL,
	`item_qte_vendue` INT NOT NULL,
	`item_type` VARCHAR(8) NOT NULL,
	`item_livre_auteur` VARCHAR(255) NULL,
	`item_livre_date_publication` INT(11) DEFAULT NULL,
	`item_musique_artiste` VARCHAR(255) NULL,
	`item_musique_style` VARCHAR(255) NULL,
	`item_date_sortie` INT(11) DEFAULT NULL,
	`item_vetement_sexe` VARCHAR(1) NULL,
	`item_vetement_couleur` VARCHAR(10) NULL,
	`item_vetement_taille` VARCHAR(3) NULL,
	`item_sport_categorie` VARCHAR(255) NULL,
	PRIMARY KEY (`item_id`)
) ENGINE = INNODB;


CREATE TABLE `piscine_test`.`panier` (  
	`item_id` INT NOT NULL,
	`utilisateur_email` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`item_id`,`utilisateur_email`),
	CONSTRAINT `fk_item_id`
		FOREIGN KEY (`item_id`)
		REFERENCES `item`(`item_id`),
	CONSTRAINT `fk_utilisateur_email`
		FOREIGN KEY (`utilisateur_email`)
		REFERENCES `utilisateur`(`utilisateur_email`)
) ENGINE = InnoDB;
