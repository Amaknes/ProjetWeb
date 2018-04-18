#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


DROP DATABASE IF EXISTS `projetweb`;

CREATE DATABASE `projetweb`;

USE `projetweb`;

#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE `Users`(
        IDUser    int (11) Auto_increment  NOT NULL ,
        LastName  Varchar (50) NOT NULL ,
        FirstName Varchar (50) NOT NULL ,
        Email     Varchar (100) NOT NULL UNIQUE,
        Password  Varchar (255) NOT NULL ,
        Status    Int NOT NULL DEFAULT 1,
        PRIMARY KEY (IDUser )
)ENGINE=InnoDB;

INSERT INTO `Users` (`LastName`, `FirstName`, `Email`, `Password`, `Status`) VALUES
		('Pasquet', 'Vincent', 'vincent.pasquet@viacesi.fr', 'Test455852', 3),
		('Moyon', 'Matthis', 'matthis.moyon@viacesi.fr', 'Azerty456', 3),
		('Chéraud', 'Florentin', 'florentin.cheraud@viacesi.fr', 'JhreyU85000', 3),
		('Vincent', 'Amaury', 'amaury.vincent@viacesi.fr', 'RHG54T8D', 3),
		('Gallet', 'Jeremy', 'jgallet@cesi.fr', 'Mespetitspoulets44600', 2),
		('Van damme', 'Jean-Claude', 'jcvd@cesi.fr', 'AZERTY123', 1),
		('Schwarzy', 'Arnold', 'iwillbeback@cesi.fr', 'SARAHCONNOR1984', 1),
		('Potter', 'Harry', 'harry.potter@cesi.fr', 'AVADAKEDAVRA666', 1),
		('Etudiant', 'CESI', 'etudiant@cesi.fr', 'Etudiant123456', 1),
		('Salarie', 'CESI', 'cesi@cesi.fr', 'Salarie123456', 2),
		('BDE', 'CESI', 'bde@cesi.fr', 'Bde123456', 3);



#------------------------------------------------------------
# Table: Products
#------------------------------------------------------------

CREATE TABLE `Products`(
        IDProduct int (11) Auto_increment  NOT NULL ,
        Name      Varchar (50) NOT NULL,
        Category  Varchar (50) NOT NULL DEFAULT 'Others',
        Price     Int NOT NULL DEFAULT 0,
        UrlImage  Varchar (200) NOT NULL,
        PRIMARY KEY (IDProduct )
)ENGINE=InnoDB;

INSERT INTO `Products` (`Name`, `Category`, `Price`, `UrlImage`) VALUES
		('4L', 'Voiture', 1500, 'Ressources/Products/4L.png'),
		('Blouson', 'Vêtements', 45, 'Ressources/Products/Blouson.png'),
		('Polo', 'Vêtements', 20, 'Ressources/Products/Polo.png'),
		('Sweat à capuche bleu et blanc', 'Vêtements', 37, 'Ressources/Products/Pull1_Blanc.png'),
		('Sweat à capuche bleu et noir', 'Vêtements', 35, 'Ressources/Products/Pull2_Noir.png'),
		('Sweat à capuche bleu et bleu marine', 'Vêtements', 32, 'Ressources/Products/Pull3_Bleu.png'),
		('Sandwich Elior', 'Alimentaire', 13, 'Ressources/Products/Sandwich_Elior.png'),
		('Sweat à capuche logo blanc', 'Vêtements', 30, 'Ressources/Products/Sweat1.png'),
		('Sweat à capuche', 'Vêtements', 30, 'Ressources/Products/Sweat2.png'),
		('T-shirt gris WEI 2K17', 'Vêtements', 14, 'Ressources/Products/TShirt_Gris.png'),
		('T-shirt jaune WEI 2K17', 'Vêtements', 14, 'Ressources/Products/TShirt_Jaune.png'),
		('T-shirt rouge WEI 2K17', 'Vêtements', 14, 'Ressources/Products/TShirt_Rouge.png'),
		('Gobelet WEI 2K17', 'Accessoires', 2, 'Ressources/Products/Gobelet_BDE.png');



#------------------------------------------------------------
# Table: Orders
#------------------------------------------------------------

CREATE TABLE `Orders`(
        IDOrder   int (11) Auto_increment  NOT NULL ,
        OrderDate Date NOT NULL ,
        Status    Bool NOT NULL DEFAULT 0,
        IDUser    Int NOT NULL ,
        PRIMARY KEY (IDOrder )
)ENGINE=InnoDB;

INSERT INTO `Orders` (`OrderDate`, `Status`,`IDUser`) VALUES
		('2018-01-10', 1, 1),
		('2018-02-02', 1, 2),
		('2018-03-12', 1, 3),
		('2018-04-10', 1, 7),
		('2018-04-17', 0, 4);


#------------------------------------------------------------
# Table: Events
#------------------------------------------------------------

CREATE TABLE `Events`(
        IDEvent     int (11) Auto_increment  NOT NULL ,
        Name        Varchar (50) NOT NULL,
        EventDate   Date ,
        Price       Int NOT NULL DEFAULT 0,
        UrlImage    Varchar (200) ,
        Description Varchar (1200) NOT NULL ,
        Selected    Bool NOT NULL DEFAULT 0,
        PRIMARY KEY (IDEvent )
)ENGINE=InnoDB;

INSERT INTO `Events` (`Name`, `EventDate`, `Price`, `UrlImage`, `Description`, `Selected`) VALUES
		('Entreprendre pour apprendre', '2018-04-09', 0, 'Ressources/Events/EntreprendrePourApprendre/Main_Pic.jpg', '« Un centre ville connecté au service du citoyen » ! Une belle thématique pour cette journée de créativité #innovepa en partenariat avec LA CPME Pays de la Loire La Carène Saint-Nazaire et agglomération et le Campus CESI Saint-Nazaire!', 1),
		('Césiades', '2018-05-10', 95, 'Ressources/Events/Cesiades/Main_Pic.jpg', 'Les pré-inscriptions pour les cesiades sont bientôt terminées (plus de 20 préinscrits) !\r\n\r\nIl ne reste plus que quelques places, alors n’hésitez pas à vous inscrire !!!\r\n\r\nCeux déjà inscrits, pour clôturer la démarche, merci de ramener, la semaine prochaine, un chèque de 95€ à l’ordre du BDE CESI Saint-Nazaire.\r\n\r\nNous passerons dans les salles vous distribuez un papier récapitulant vos informations personnelles et pour récupérer les chèques.', 0),
		('Western Party', '2018-02-07', 0, 'Ressources/Events/WesternParty/Main_Pic.jpg', 'Préparez vos chapeaux pour demain... On vous amène un taureau mécanique à l\'intérieur du Bières et chopes Pornichet !\r\n\r\nEvidemment celui qui tiendra le plus longtemps gagnera un petit cadeau !\r\n\r\nUn lot sera remis au meilleur COWBOY !\r\n\r\nN\'oubliez pas de venir déguiser', 0),
		('Babyfoot de fou avec Joris et Gaëlle', '2018-04-22', 58, 'Ressources/Events/Babyfoot/Main_Pic.jpg', 'Gros tournois de Babyfoot prévu à Polytech, une compétition très ardue incluant notamment des joueurs reconnus professionels depuis leurs victoires éclatantes aux championnats intercommunaux de 2012 sous la bannière de l\'équipe "Les Requins Marteaux". Merci de prévoir vos propres serviettes pour essuyer la transpiration sur les poignées.', 0);


#------------------------------------------------------------
# Table: Pictures
#------------------------------------------------------------

CREATE TABLE `Pictures`(
        IDPicture int (11) Auto_increment  NOT NULL ,
        UrlImage  Varchar (200) NOT NULL UNIQUE,
        PicFlag   Bool NOT NULL DEFAULT 0,
        IDEvent   Int NOT NULL ,
        IDUser    Int NOT NULL ,
        PRIMARY KEY (IDPicture )
)ENGINE=InnoDB;

INSERT INTO `Pictures` (`UrlImage`, `IDEvent`, `IDUser`) VALUES
		('Ressources/Events/WesternParty/Pic_1.png', 3, 1),
		('Ressources/Events/EntreprendrePourApprendre/Pic_1.jpg', 1, 3),
		('Ressources/Events/EntreprendrePourApprendre/Pic_2.jpg', 1, 3),
		('Ressources/Events/EntreprendrePourApprendre/Pic_3.jpg', 1, 3),
		('Ressources/Events/Babyfoot/Pic_1.jpg', 4, 2),
		('Ressources/Events/Babyfoot/Pic_2.jpg', 4, 2),
		('Ressources/Events/Cesiades/Pic_1.jpg', 2, 4);

#------------------------------------------------------------
# Table: Comments
#------------------------------------------------------------

CREATE TABLE `Comments`(
        IDComment   int (11) Auto_increment  NOT NULL ,
        Content     Varchar (400) NOT NULL ,
        CommentFlag Bool NOT NULL DEFAULT 0,
        IDPicture   Int NOT NULL ,
        IDUser      Int NOT NULL ,
        PRIMARY KEY (IDComment )
)ENGINE=InnoDB;

INSERT INTO `Comments` (`Content`, `CommentFlag`, `IDPicture`, `IDUser`) VALUES
		("Quelqu'un connait le modèle de l'écharpe noire et blanche de Mr Poulot? Je la trouve super stylée et j'aimerais bien avoir la même !", 0, 2, 2),
		("Je l'ai aperçue a Desigual il y a quelques jours, vas voir si c'est la même ;)", 0, 2, 5);


#------------------------------------------------------------
# Table: Ideas
#------------------------------------------------------------

CREATE TABLE `Ideas`(
        IDIdea   int (11) Auto_increment  NOT NULL ,
        Activity Varchar (500) NOT NULL ,
		IdeaFlag Bool NOT NULL DEFAULT 0,
        IDUser   Int NOT NULL ,
        PRIMARY KEY (IDIdea )
)ENGINE=InnoDB;

INSERT INTO `Ideas` (`Activity`, `IDUser`) VALUES
		('On pourrait faire un tournoi de basket', 3),
		('Une initiation au Quidditch', 1);

#------------------------------------------------------------
# Table: Contain
#------------------------------------------------------------

CREATE TABLE `Contain`(
        Quantity  Int NOT NULL ,
        IDOrder   Int NOT NULL ,
        IDProduct Int NOT NULL ,
        PRIMARY KEY (IDOrder ,IDProduct )
)ENGINE=InnoDB;

INSERT INTO `Contain` (`Quantity`, `IDOrder`, `IDProduct`) VALUES
		(3, 1, 13),
		(1, 1, 1),
		(12, 2, 7),
		(1, 3, 3),
		(1, 3, 13),
		(3, 3, 11),
		(2, 4, 1),
		(1, 4, 10),
		(1, 4, 6),
		(1, 5, 4),
		(1, 5, 5);


#------------------------------------------------------------
# Table: Participate
#------------------------------------------------------------

CREATE TABLE `Participate`(
        IDUser  Int NOT NULL ,
        IDEvent Int NOT NULL ,
        PRIMARY KEY (IDUser ,IDEvent )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Like
#------------------------------------------------------------

CREATE TABLE `Like`(	
        IDUser    Int NOT NULL ,
        IDPicture Int NOT NULL ,
        PRIMARY KEY (IDUser ,IDPicture )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Vote
#------------------------------------------------------------

CREATE TABLE `Vote`(
        IDUser Int NOT NULL ,
        IDIdea Int NOT NULL ,
        PRIMARY KEY (IDUser ,IDIdea )
)ENGINE=InnoDB;

ALTER TABLE `Orders` ADD CONSTRAINT FK_Orders_IDUser FOREIGN KEY (IDUser) REFERENCES Users(IDUser);
ALTER TABLE `Pictures` ADD CONSTRAINT FK_Pictures_IDEvent FOREIGN KEY (IDEvent) REFERENCES Events(IDEvent);
ALTER TABLE `Pictures` ADD CONSTRAINT FK_Pictures_IDUser FOREIGN KEY (IDUser) REFERENCES Users(IDUser);
ALTER TABLE `Comments` ADD CONSTRAINT FK_Comments_IDPicture FOREIGN KEY (IDPicture) REFERENCES Pictures(IDPicture);
ALTER TABLE `Comments` ADD CONSTRAINT FK_Comments_IDUser FOREIGN KEY (IDUser) REFERENCES Users(IDUser);
ALTER TABLE `Ideas` ADD CONSTRAINT FK_Ideas_IDUser FOREIGN KEY (IDUser) REFERENCES Users(IDUser);
ALTER TABLE `Contain` ADD CONSTRAINT FK_Contain_IDOrder FOREIGN KEY (IDOrder) REFERENCES Orders(IDOrder);
ALTER TABLE `Contain` ADD CONSTRAINT FK_Contain_IDProduct FOREIGN KEY (IDProduct) REFERENCES Products(IDProduct);
ALTER TABLE `Participate` ADD CONSTRAINT FK_Participate_IDUser FOREIGN KEY (IDUser) REFERENCES Users(IDUser);
ALTER TABLE `Participate` ADD CONSTRAINT FK_Participate_IDEvent FOREIGN KEY (IDEvent) REFERENCES Events(IDEvent);
ALTER TABLE `Like` ADD CONSTRAINT FK_Like_IDUser FOREIGN KEY (IDUser) REFERENCES Users(IDUser);
ALTER TABLE `Like` ADD CONSTRAINT FK_Like_IDPicture FOREIGN KEY (IDPicture) REFERENCES Pictures(IDPicture);
ALTER TABLE `Vote` ADD CONSTRAINT FK_Vote_IDUser FOREIGN KEY (IDUser) REFERENCES Users(IDUser);
ALTER TABLE `Vote` ADD CONSTRAINT FK_Vote_IDIdea FOREIGN KEY (IDIdea) REFERENCES Ideas(IDIdea);
