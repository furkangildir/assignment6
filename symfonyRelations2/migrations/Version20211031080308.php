<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211031080308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE akademisyenler (id INT AUTO_INCREMENT NOT NULL, ad VARCHAR(255) NOT NULL, soyad VARCHAR(255) NOT NULL, uzmanlik VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dersler (id INT AUTO_INCREMENT NOT NULL, akademisyen_id_id INT NOT NULL, ogrenci_id_id INT NOT NULL, ders_adi VARCHAR(255) NOT NULL, ders_kodu VARCHAR(255) NOT NULL, ders_aciklamasi VARCHAR(255) NOT NULL, INDEX IDX_A778280AF878F8FF (akademisyen_id_id), INDEX IDX_A778280A7BE8CF58 (ogrenci_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ogrenciler (id INT AUTO_INCREMENT NOT NULL, ad VARCHAR(255) NOT NULL, soyad VARCHAR(255) NOT NULL, ogrenci_no INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dersler ADD CONSTRAINT FK_A778280AF878F8FF FOREIGN KEY (akademisyen_id_id) REFERENCES akademisyenler (id)');
        $this->addSql('ALTER TABLE dersler ADD CONSTRAINT FK_A778280A7BE8CF58 FOREIGN KEY (ogrenci_id_id) REFERENCES ogrenciler (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dersler DROP FOREIGN KEY FK_A778280AF878F8FF');
        $this->addSql('ALTER TABLE dersler DROP FOREIGN KEY FK_A778280A7BE8CF58');
        $this->addSql('DROP TABLE akademisyenler');
        $this->addSql('DROP TABLE dersler');
        $this->addSql('DROP TABLE ogrenciler');
    }
}
