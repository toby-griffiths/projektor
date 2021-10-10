<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211010193138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds start/end to project table';
    }


    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE project ADD starts DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD ends DATE DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN project.starts IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN project.ends IS \'(DC2Type:date_immutable)\'');
    }


    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE project DROP starts');
        $this->addSql('ALTER TABLE project DROP ends');
    }
}
