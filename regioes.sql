use pit;

DROP TABLE IF EXISTS `regioes`;
CREATE TABLE IF NOT EXISTS `regioes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_regiao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=503 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

select * from regioes;

INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES 
(1, 'Região Barreiro'), 
(2, 'Região Centro Sul'), 
(3, 'Região Leste'), 
(4, 'Região Nordeste'), 
(5, 'Região Noroeste'), 
(6, 'Região Norte'), 
(7, 'Região Oeste'), 
(8, 'Região Pampulha'), 
(9, 'Região Venda Nova'); 
