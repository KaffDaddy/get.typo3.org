<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180318170842 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE major_version (version INTEGER NOT NULL, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, maintained_until DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , release_date DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , PRIMARY KEY(version))');
        $this->addSql('CREATE TABLE "release" (version VARCHAR(255) NOT NULL, major_version INTEGER DEFAULT NULL, date DATETIME NOT NULL, type VARCHAR(255) NOT NULL, tar_package_md5sum VARCHAR(255) DEFAULT NULL, tar_package_sha1sum VARCHAR(255) DEFAULT NULL, tar_package_sha256sum VARCHAR(255) DEFAULT NULL, zip_package_md5sum VARCHAR(255) DEFAULT NULL, zip_package_sha1sum VARCHAR(255) DEFAULT NULL, zip_package_sha256sum VARCHAR(255) DEFAULT NULL, PRIMARY KEY(version))');
        $this->addSql('CREATE INDEX IDX_9E47031D17E84B00 ON "release" (major_version)');
        $this->addSql('CREATE TABLE requirement (uuid CHAR(36) NOT NULL --(DC2Type:guid)
        , version INTEGER DEFAULT NULL, category VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, min DOUBLE PRECISION DEFAULT NULL, max DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_DB3F5550BF1CD3C3 ON requirement (version)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE major_version');
        $this->addSql('DROP TABLE "release"');
        $this->addSql('DROP TABLE requirement');
    }
}
