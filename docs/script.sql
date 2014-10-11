SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `IAC` ;
USE `IAC` ;

-- -----------------------------------------------------
-- Table `IAC`.`Comprador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `IAC`.`Comprador` ;

CREATE  TABLE IF NOT EXISTS `IAC`.`Comprador` (
  `idComprador` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NOT NULL ,
  `cpf` VARCHAR(14) NOT NULL ,
  `rg` VARCHAR(50) NOT NULL ,
  `nascimento` DATE NOT NULL ,
  PRIMARY KEY (`idComprador`) ,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IAC`.`Endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `IAC`.`Endereco` ;

CREATE  TABLE IF NOT EXISTS `IAC`.`Endereco` (
  `idComprador` INT NOT NULL ,
  `cep` VARCHAR(9) NOT NULL ,
  `logradouro` VARCHAR(255) NOT NULL ,
  `bairro` VARCHAR(255) NOT NULL ,
  `cidade` VARCHAR(255) NOT NULL ,
  `estado` VARCHAR(2) NOT NULL ,
  `numero` INT NOT NULL ,
  `Enderecocol` VARCHAR(45) NULL ,
  INDEX `idComprador_idx` (`idComprador` ASC) ,
  CONSTRAINT `FK_COMPRADOR_ENDERECO`
    FOREIGN KEY (`idComprador` )
    REFERENCES `IAC`.`Comprador` (`idComprador` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IAC`.`Time`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `IAC`.`Time` ;

CREATE  TABLE IF NOT EXISTS `IAC`.`Time` (
  `idTime` INT NOT NULL ,
  `selecao` VARCHAR(255) NOT NULL ,
  `bandeira` BLOB NOT NULL ,
  PRIMARY KEY (`idTime`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IAC`.`Jogo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `IAC`.`Jogo` ;

CREATE  TABLE IF NOT EXISTS `IAC`.`Jogo` (
  `idJogo` INT NOT NULL AUTO_INCREMENT ,
  `idTime1` INT NOT NULL ,
  `idTime2` INT NOT NULL ,
  `local` VARCHAR(45) NOT NULL ,
  `data` DATE NOT NULL ,
  `horario` TIME NOT NULL ,
  `maxIngresso` INT NOT NULL ,
  `is_sorteado` TINYINT NULL ,
  PRIMARY KEY (`idJogo`, `idTime1`, `idTime2`) ,
  INDEX `idTime1_idx` (`idTime1` ASC) ,
  INDEX `idTime2_idx` (`idTime2` ASC) ,
  CONSTRAINT `idTime1`
    FOREIGN KEY (`idTime1` )
    REFERENCES `IAC`.`Time` (`idTime` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idTime2`
    FOREIGN KEY (`idTime2` )
    REFERENCES `IAC`.`Time` (`idTime` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IAC`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `IAC`.`Usuario` ;

CREATE  TABLE IF NOT EXISTS `IAC`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `idComprador` INT NULL ,
  `login` VARCHAR(20) NOT NULL ,
  `senha` VARCHAR(32) NOT NULL ,
  INDEX `idComprador_idx` (`idComprador` ASC) ,
  PRIMARY KEY (`idUsuario`) ,
  CONSTRAINT `FK_COMPRADOR_USUARIO`
    FOREIGN KEY (`idComprador` )
    REFERENCES `IAC`.`Comprador` (`idComprador` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IAC`.`Comprador_Jogo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `IAC`.`Comprador_Jogo` ;

CREATE  TABLE IF NOT EXISTS `IAC`.`Comprador_Jogo` (
  `idComprador` INT NOT NULL ,
  `idJogo` INT NOT NULL ,
  INDEX `idComprador_idx` (`idComprador` ASC) ,
  INDEX `idJogo_idx` (`idJogo` ASC) ,
  CONSTRAINT `FK_COMPRADOR_COMPRADOR_JOGO`
    FOREIGN KEY (`idComprador` )
    REFERENCES `IAC`.`Comprador` (`idComprador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_JOGO_COMPRADOR_JOGO`
    FOREIGN KEY (`idJogo` )
    REFERENCES `IAC`.`Jogo` (`idJogo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IAC`.`Sorteio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `IAC`.`Sorteio` ;

CREATE  TABLE IF NOT EXISTS `IAC`.`Sorteio` (
  `idSorteio` INT NOT NULL AUTO_INCREMENT ,
  `idJogo` INT NOT NULL ,
  `idComprador` INT NOT NULL ,
  PRIMARY KEY (`idSorteio`) ,
  UNIQUE INDEX `idComprador_UNIQUE` (`idComprador` ASC) ,
  INDEX `FK_JOGO_SORTEIO_idx` (`idJogo` ASC) ,
  CONSTRAINT `FK_COMPRADOR_SORTEIO`
    FOREIGN KEY (`idComprador` )
    REFERENCES `IAC`.`Comprador` (`idComprador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_JOGO_SORTEIO`
    FOREIGN KEY (`idJogo` )
    REFERENCES `IAC`.`Jogo` (`idJogo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `IAC` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
