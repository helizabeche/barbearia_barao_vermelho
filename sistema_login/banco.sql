//tabela do sistema de login

CREATE TABLE `barbearia-barao`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `nivel_acesso` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
