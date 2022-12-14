--
-- Structure de la table livre
--
CREATE TABLE IF NOT EXISTS Livre(
  idLivre SMALLINT UNSIGNED AUTO_INCREMENT,
  titre varchar(200) NOT NULL,
  resume varchar(2000) NOT NULL,
  dateParution DATE NOT NULL,
  idAuteur SMALLINT UNSIGNED,
  idEditeur SMALLINT UNSIGNED,
  idGenre SMALLINT UNSIGNED,
  image varchar(200),
  PRIMARY KEY (idLivre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table Auteur
--
CREATE TABLE IF NOT EXISTS Auteur (
  idAuteur SMALLINT UNSIGNED AUTO_INCREMENT,
  nomAuteur varchar(50) NOT NULL,
  prenomAuteur varchar(50) NOT NULL,
  PRIMARY KEY (idAuteur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure de la table Editeur
--
CREATE TABLE IF NOT EXISTS Editeur (
  idEditeur SMALLINT UNSIGNED AUTO_INCREMENT,
  nomEditeur varchar(50) NOT NULL,
  PRIMARY KEY (idEditeur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table Genre
--
CREATE TABLE IF NOT EXISTS Genre (
  idGenre SMALLINT UNSIGNED,
  genre varchar(100) NOT NULL,
  PRIMARY KEY (idGenre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table User
--
CREATE TABLE IF NOT EXISTS User (
  id SMALLINT UNSIGNED AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  temp_password varchar(100) NOT NULL,
  privilege_id SMALLINT UNSIGNED,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table Privilege
--
CREATE TABLE IF NOT EXISTS Privilege (
  id SMALLINT UNSIGNED,
  privilege varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table Journal
--
CREATE TABLE IF NOT EXISTS Journal(
  id SMALLINT UNSIGNED AUTO_INCREMENT,
  ip varchar(15) NOT NULL,
  date_visite DATE NOT NULL,
  username varchar(100) NOT NULL,
  page_visitee varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE Livre ADD CONSTRAINT contrainte1 FOREIGN KEY(idAuteur) references Auteur(idAuteur);
ALTER TABLE Livre ADD CONSTRAINT contrainte2 FOREIGN KEY(idEditeur) references Editeur(idEditeur);
ALTER TABLE Livre ADD CONSTRAINT contrainte3 FOREIGN KEY(idGenre) references Genre(idGenre);
ALTER TABLE User ADD CONSTRAINT contrainte4 FOREIGN KEY(privilege_id) references Privilege(id);

--
-- D??chargement des donn??es des tables
--

INSERT INTO Auteur (idAuteur,nomAuteur,prenomAuteur) VALUES
(1,'Musso','Guillaume'),
(2,'Pob','Robert'),
(3,'Daniel','Marc'),
(4,'Wild','Emmy'),
(5,'Bussi','Michel'),
(6,'Grisham','John'),
(7,'Atwood','Margaret'),
(8,'Owens','Delia'),
(9,'Dugoni','Robert');


INSERT INTO Editeur (idEditeur,nomEditeur) VALUES
(1,'??ditions de l\'??p??e'),
(2,'Points'),
(3,'Aparis'),
(4,'Albin Michel'),
(5,'Presses de la Cit?? '),
(6,'Le Livre de Poche'),
(7,'Pavillion poche'),
(8,'Le Seuil '),
(9,'Amazon Crossing');

INSERT INTO Genre (idGenre,genre) VALUES
(1,'Policier'),
(2,'Fiction'),
(3,'Histoire'),
(4,'Horreur'),
(5,'Aventure'),
(6,'Classique'),
(7,'Romantique');

INSERT INTO Livre (idLivre,idAuteur,idEditeur,dateParution,idGenre,titre,resume,image) VALUES
(1,1,1,'2015-03-26',1,'L\'Instant pr??sent','\" Souviens-toi que l\'on a deux vies.La seconde commence le jour o?? on se rend compte que l\'on n\'en a qu\'une.\"Pour payer ses ??tudes d\'art dramatique, Lisa travaille dans un bar de Manhattan. Elle y fait la connaissance d\'Arthur Costello, un jeune m??decin urgentiste.En apparence, il a tout pour plaire. Mais Arthur n\'est pas un homme comme les autres. Deux ans plus t??t, il a h??rit?? de la r??sidence de son grand-p??re : un vieux phare isol?? dans lequel une pi??ce a ??t?? condamn??e.Malgr?? sa promesse, il a choisi d\'ouvrir la porte, d??couvrant une v??rit?? bouleversante qui lui interdit de mener une vie normale.Sa rencontre avec Lisa va tout changer et lui redonner une raison d\'esp??rer. D??s lors, Arthur et Lisa n\'ont qu\'une obsession, d??jouer les pi??ges que leur impose le plus impitoyable des ennemis : le temps.
Un suspense psychologique vertigineux au final stup??fiant.', 'livre1.PNG'),
(2,2,2,'2021-03-11',2,'City of windows', 'New York : lors d\'une effroyable temp??te de neige, un flic du FBI, puis un autre, sont assassin??s par un sniper. D??sempar??s par l\'??trange mode op??ratoire du tueur, les enqu??teurs font appel ?? un de leurs anciens agents : Lucas Page. Devenu professeur d\'astrophysique, atteint du syndrome d\'Asperger, Page poss??de un talent exceptionnel pour d??crypter une sc??ne de crime d??s lors qu\'angles et trajectoires entrent en ligne de compte. Grandiose et captivant, empreint d\'un humour d??vastateur, ce roman se lit sans temps mort.Apr??s deux thrillers ?? succ??s, Robert Pobi revient sur le devant de la sc??ne avec cette premi??re enqu??te de Lucas Page, d??but d\'une s??rie magn??tique.', 'livre2.PNG'),
(3,3,3,'2021-07-09',3,'La Fille de Nulle Part', 'Pourquoi une fillette de neuf ans sortirait-elle du chalet de ses parents au beau milieu de la nuit ? Pourquoi quitterait-elle son lit douillet pour affronter la rigueur d\'un hiver dans le Montana ? Et pourquoi ne l\'a-t-on jamais revue ?Vingt ans plus tard, son oncle est sauvagement assassin?? alors que des d??pouilles d\'enfants sont d??couvertes dissimul??es dans une grotte ?? quelques kilom??tres du chalet familial.
S\'agirait-il d\'une co??ncidence ? Ethan Archer ne le croit pas. Mais cet ancien profileur criminel peut-il se fier ?? son propre jugement ? N\'a-t-il pas perdu son savoir-faire en m??me temps que tout le reste, lors de cette nuit fatidique qui transforma son existence en v??ritable cauchemar ? Archer n\'a pas travaill?? sur une affaire de meurtre depuis et n\'a aucune envie de s\'y remettre. Mais lorsque les cadavres se multiplient et qu\'il se retrouve dans la ligne de mire du tueur, il n\'a plus d\'autre choix.', 'livre3.PNG'),
(4,4,4,'2022-02-03',4,'Until I Found You', 'Mon ann??e de c??sure devait ??tre la plus belle de ma vie. J\'avais tout pr??vu. Des petits boulots pour m\'autofinancer ?? l\'itin??raire du roadtrip dont je r??vais depuis des mois. J\'??tais sur le point de conqu??rir le Canada. 
Sur le point de changer ma vie pour le meilleur.Jusqu\'?? ce qu\'un soir, mes yeux croisent ce regard bleu ?? la lueur assassine.Rien ne me pr??destinait ?? tomber dans les griffes de la mafia irlandaise. Pourtant, cette nuit-l??, mon r??ve a vir?? au cauchemar.', 'livre4.PNG'),
(5,5,5,'2021-01-21',5,'Rien ne t\'efface', 'Par amour pour un enfant, que seriez-vous pr??t ?? faire ? Maddi, elle, ira jusqu\'au bout...Une intrigue magistrale, un twist virtuose pour le nouveau suspense 100% Bussi.2010. Maddi est m??decin g??n??raliste ?? Saint-Jean-de-Luz, une vie combl??e avec Esteban, son fils de 10 ans.Ce jour d\'??t?? l??, elle le laisse quelques minutes seul sur la plage. Quand elle revient, Esteban a disparu.2020. Maddi a refait sa vie, et revient sur cette plage en p??lerinage.Au bord de l\'eau, un enfant est l??. M??me maillot de bain, m??me taille, m??me corpulence, m??me coupe de cheveux. Elle s\'approche. Le temps se fige. C\'est Esteban, ou son jumeau parfait.Maddi n\'a plus qu\'une obsession, savoir qui est cet enfant.', 'livre5.PNG'),
(6,6,6,'2022-03-21',6,'Les oubli??s','?? Seabrook, petite ville de Floride, le jeune avocat Keith Russo est tu?? ?? coups de fusil alors qu\'il travaille un soir dans son bureau. L\'assassin n\'a laiss?? aucun indice. Il n\'y a aucun t??moin, aucun mobile. Mais la police trouve bient??t un suspect, Quincy Miller, un homme noir et ancien client de Russo.Quincy est jug?? et condamn?? ?? une peine de r??clusion ?? perp??tuit??. Pendant vingt-deux ans, il se morfond en prison et ne cesse de clamer son innocence. De d??sespoir, il ??critune lettre aux Anges Gardiens, une fondation qui tente de r??parer les erreurs judiciaires et sauver des innocents. Cullen Post, avocat et ancien pasteur de l\'??glise ??piscopale,en fait partie. 
Les Anges Gardiens n\'acceptent que tr??s peu d\'affaires.', 'livre6.PNG'),
(7,7,7,'2017-06-08',7,'La Servante ??carlate','Devant la chute drastique de la f??condit??, la r??publique de Gilead, r??cemment fond??e par des fanatiques religieux.V??tue de rouge, Defred, \" servante ??carlate \" parmi d\'autres, ?? qui l\'ona ??t?? jusqu\'?? son nom,elle songe au temps o?? les femmes avaient le droit de lire, de travailler... En rejoignant un r??seau secret, elle va tout tenter pour recouvrer sa libert??.', 'livre7.PNG'),
(8,8,8,'2020-01-02',1,'L?? o?? chantent les ??crevisses', 'Pendant des ann??es, les rumeurs les plus folles ont couru sur " la Fille des marais " de Barkley Cove, une petite ville de Caroline du Nord. Pourtant, Kya n\'est pas cette fille sauvage et analphab??te que tous imaginent et craignent.A l\'??ge de dix ans, abandonn??e par sa famille, elle doit apprendre ?? survivre seule dans le marais, devenu pour elle un refuge naturel et une protection. Sa rencontre avec Tate, un jeune homme doux et cultiv?? qui lui apprend ?? lire et ?? ??crire, lui fait d??couvrir la science et la po??sie, transforme la jeune fille ?? jamais. Mais Tate, appel?? par ses ??tudes, l\'abandonne ?? son tour. La solitude Devient si pesante que Kya ne se m??fie pas assez de celui qui va bient??t croiser son chemin et lui promettre une autre vie.', 'livre8.PNG'),
(9,9,9,'2021-11-23',2,'Fausses pistes', 'La derni??re fois que la d??tective Tracy Crosswhite s\'est trouv??e ?? Cedar Grove, c\'??tait pour voir l\'assassin de sa s??ur envoy?? derri??re les barreaux. Elle compte bien profiter de son cong?? maternit??, mais le sh??rif de la petite bourgade lui demande son aide pour r??soudre une double affaire : un incendie criminel ayant caus?? la mort de la femme d\'un officier de police et celle d\'un ancien avocat victime d\'un pr??tendu accident de chasse.Alors que le meurtrier qu\'elle traque se rapproche dangereusement d\'elle, jusqu\'o?? Tracy sera-t-elle pr??te ?? aller pour trouver la v??rit?? ?', 'livre9.PNG');


INSERT INTO Privilege (id, privilege) VALUES
(1,'administrateur'),
(2,'utilisateur');


INSERT INTO User (username, password, email, temp_password, privilege_id) VALUES
('admin@email.com', '$2y$10$9uVzS98md3GQ3mgAIRav3Orb0JOFqnyVymd0o83XQARfPTzEc4KyG', 'admin@email.com', '$2y$10$9uVzS98md3GQ3mgAIRav3Orb0JOFqnyVymd0o83XQARfPTzEc4KyG', 1),
('user@email.com', '$2y$10$9uVzS98md3GQ3mgAIRav3Orb0JOFqnyVymd0o83XQARfPTzEc4KyG', 'user@email.com', '$2y$10$9uVzS98md3GQ3mgAIRav3Orb0JOFqnyVymd0o83XQARfPTzEc4KyG', 2);
