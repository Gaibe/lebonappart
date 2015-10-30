



INSERT INTO `type` (`id_type`, `nom`) VALUES
(1, 'maison'),
(2, 'appartement'),
(3, 'garage'),
(4, 'villa');



INSERT INTO `vendeur` (`id_vendeur`, `name`, `mail`, `num_tel`) VALUES
(1, 'Jacquie', 'jacquie@mail.com', '0387878787'),
(2, 'Robert', 'barreau_du_54@mail.com', '0354565859'),
(3, 'Terry', 'terry@mail.com', '0687565895');



INSERT INTO `ville` (`id_ville`, `nom`) VALUES
(1, 'Nancy'),
(2, 'Strasbourg'),
(6, 'Toulouse');

INSERT INTO `quartier` (`id_quartier`, `nom`, `id_ville`) VALUES
(1, 'square du Boufflers', 1),
(2, 'avenue de la Liberation', 2),
(3, 'square du Boufflers', 1);




INSERT INTO `annonce` (`id_annonce`, `description`, `superficie`, `loc_vente`, `prix`, `nb_piece`, `id_type`, `id_vendeur`, `id_quartier`) VALUES
(2, 'Village de armix, maison de village en pierre t3 rénovée d''environ 80 m² composé d''une cuisine ouverte sur une salle à manger', 80, 'vente', 105000.00, 3, 4, 2, 1);


INSERT INTO `image` (`id_image`, `url`, `id_annonce`) VALUES
(1, 'http://a.visuels.poliris.com/bigs/a/8/7/2/a872041f-4a30.jpg', 2),
(2, 'http://4.visuels.poliris.com/bigs/4/9/2/1/49215f8d-41d5.jpg', 2);
