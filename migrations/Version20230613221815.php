<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230613221815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE currencies_id_seq1 CASCADE');
        $this->addSql('ALTER TABLE currencies ALTER id DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE currencies_id_seq1 INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE currencies_id_seq');
        $this->addSql('SELECT setval(\'currencies_id_seq\', (SELECT MAX(id) FROM currencies))');
        $this->addSql('ALTER TABLE currencies ALTER id SET DEFAULT nextval(\'currencies_id_seq\')');
    }
}
