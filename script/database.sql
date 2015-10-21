CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_ville`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_type`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `quartier` (
  `id_quartier` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `id_ville` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_quartier`),
  INDEX `fk_ville_id_ville_idx` (`id_ville` ASC),
  CONSTRAINT `fk_ville_id_ville`
    FOREIGN KEY (`id_ville`)
    REFERENCES `ville` (`id_ville`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;





CREATE TABLE IF NOT EXISTS `vendeur` (
  `id_vendeur` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `mail` VARCHAR(255) NOT NULL,
  `num_tel` VARCHAR(20) NULL,
  PRIMARY KEY (`id_vendeur`),
  UNIQUE INDEX `mail_UNIQUE` (`mail` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `annonce` (
  `id_annonce` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(255) NULL DEFAULT '',
  `superficie` INT(10) NOT NULL,
  `loc_vente` ENUM('vente', 'location') NOT NULL,
  `prix` FLOAT(10,2) UNSIGNED NOT NULL,
  `nb_piece` INT(5) UNSIGNED NOT NULL,
  `id_type` INT(10) UNSIGNED NOT NULL,
  `id_vendeur` INT(10) UNSIGNED NOT NULL,
  `id_quartier` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_annonce`),
  INDEX `fk_vendeur_id_vendeur_idx` (`id_vendeur` ASC),
  INDEX `fk_type_id_type_idx` (`id_type` ASC),
  INDEX `fk_quartier_id_quartier_idx` (`id_quartier` ASC),
  CONSTRAINT `fk_vendeur_id_vendeur`
    FOREIGN KEY (`id_vendeur`)
    REFERENCES `vendeur` (`id_vendeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_type_id_type`
    FOREIGN KEY (`id_type`)
    REFERENCES `type` (`id_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_quartier_id_quartier`
    FOREIGN KEY (`id_quartier`)
    REFERENCES `quartier` (`id_quartier`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `image` (
  `id_image` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(255) NOT NULL,
  `id_annonce` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_image`),
  INDEX `fk_annonce_id_annonce_idx` (`id_annonce` ASC),
  CONSTRAINT `fk_annonce_id_annonce`
    FOREIGN KEY (`id_annonce`)
    REFERENCES `annonce` (`id_annonce`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;