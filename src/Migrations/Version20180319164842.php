<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180319164842 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__major_version AS SELECT version, title, subtitle, description, maintained_until, release_date FROM major_version');
        $this->addSql('DROP TABLE major_version');
        $this->addSql('CREATE TABLE major_version (version DOUBLE PRECISION NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, subtitle VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, maintained_until DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , release_date DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , PRIMARY KEY(version))');
        $this->addSql('INSERT INTO major_version (version, title, subtitle, description, maintained_until, release_date) SELECT version, title, subtitle, description, maintained_until, release_date FROM __temp__major_version');
        $this->addSql('DROP TABLE __temp__major_version');
        $this->addSql('DROP INDEX IDX_9E47031D17E84B00');
        $this->addSql('CREATE TEMPORARY TABLE __temp__release AS SELECT version, major_version, date, type, tar_package_md5sum, tar_package_sha1sum, tar_package_sha256sum, zip_package_md5sum, zip_package_sha1sum, zip_package_sha256sum FROM "release"');
        $this->addSql('DROP TABLE "release"');
        $this->addSql('CREATE TABLE "release" (version VARCHAR(255) NOT NULL COLLATE BINARY, major_version DOUBLE PRECISION DEFAULT NULL, date DATETIME NOT NULL, type VARCHAR(255) NOT NULL COLLATE BINARY, tar_package_md5sum VARCHAR(255) DEFAULT NULL COLLATE BINARY, tar_package_sha1sum VARCHAR(255) DEFAULT NULL COLLATE BINARY, tar_package_sha256sum VARCHAR(255) DEFAULT NULL COLLATE BINARY, zip_package_md5sum VARCHAR(255) DEFAULT NULL COLLATE BINARY, zip_package_sha1sum VARCHAR(255) DEFAULT NULL COLLATE BINARY, zip_package_sha256sum VARCHAR(255) DEFAULT NULL COLLATE BINARY, PRIMARY KEY(version), CONSTRAINT FK_9E47031D17E84B00 FOREIGN KEY (major_version) REFERENCES major_version (version) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO "release" (version, major_version, date, type, tar_package_md5sum, tar_package_sha1sum, tar_package_sha256sum, zip_package_md5sum, zip_package_sha1sum, zip_package_sha256sum) SELECT version, major_version, date, type, tar_package_md5sum, tar_package_sha1sum, tar_package_sha256sum, zip_package_md5sum, zip_package_sha1sum, zip_package_sha256sum FROM __temp__release');
        $this->addSql('DROP TABLE __temp__release');
        $this->addSql('CREATE INDEX IDX_9E47031D17E84B00 ON "release" (major_version)');
        $this->addSql('DROP INDEX IDX_DB3F5550BF1CD3C3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__requirement AS SELECT uuid, version, category, name, min, max FROM requirement');
        $this->addSql('DROP TABLE requirement');
        $this->addSql('CREATE TABLE requirement (uuid CHAR(36) NOT NULL COLLATE BINARY --(DC2Type:guid)
        , version DOUBLE PRECISION DEFAULT NULL, category VARCHAR(255) NOT NULL COLLATE BINARY, name VARCHAR(255) NOT NULL COLLATE BINARY, min DOUBLE PRECISION DEFAULT NULL, max DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(uuid), CONSTRAINT FK_DB3F5550BF1CD3C3 FOREIGN KEY (version) REFERENCES major_version (version) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO requirement (uuid, version, category, name, min, max) SELECT uuid, version, category, name, min, max FROM __temp__requirement');
        $this->addSql('DROP TABLE __temp__requirement');
        $this->addSql('CREATE INDEX IDX_DB3F5550BF1CD3C3 ON requirement (version)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__major_version AS SELECT version, title, subtitle, description, maintained_until, release_date FROM major_version');
        $this->addSql('DROP TABLE major_version');
        $this->addSql('CREATE TABLE major_version (version INTEGER NOT NULL, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, maintained_until DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , release_date DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , PRIMARY KEY(version))');
        $this->addSql('INSERT INTO major_version (version, title, subtitle, description, maintained_until, release_date) SELECT version, title, subtitle, description, maintained_until, release_date FROM __temp__major_version');
        $this->addSql('DROP TABLE __temp__major_version');
        $this->addSql('DROP INDEX IDX_9E47031D17E84B00');
        $this->addSql('CREATE TEMPORARY TABLE __temp__release AS SELECT version, major_version, date, type, tar_package_md5sum, tar_package_sha1sum, tar_package_sha256sum, zip_package_md5sum, zip_package_sha1sum, zip_package_sha256sum FROM "release"');
        $this->addSql('DROP TABLE "release"');
        $this->addSql('CREATE TABLE "release" (version VARCHAR(255) NOT NULL, date DATETIME NOT NULL, type VARCHAR(255) NOT NULL, tar_package_md5sum VARCHAR(255) DEFAULT NULL, tar_package_sha1sum VARCHAR(255) DEFAULT NULL, tar_package_sha256sum VARCHAR(255) DEFAULT NULL, zip_package_md5sum VARCHAR(255) DEFAULT NULL, zip_package_sha1sum VARCHAR(255) DEFAULT NULL, zip_package_sha256sum VARCHAR(255) DEFAULT NULL, major_version INTEGER DEFAULT NULL, PRIMARY KEY(version))');
        $this->addSql('INSERT INTO "release" (version, major_version, date, type, tar_package_md5sum, tar_package_sha1sum, tar_package_sha256sum, zip_package_md5sum, zip_package_sha1sum, zip_package_sha256sum) SELECT version, major_version, date, type, tar_package_md5sum, tar_package_sha1sum, tar_package_sha256sum, zip_package_md5sum, zip_package_sha1sum, zip_package_sha256sum FROM __temp__release');
        $this->addSql('DROP TABLE __temp__release');
        $this->addSql('CREATE INDEX IDX_9E47031D17E84B00 ON "release" (major_version)');
        $this->addSql('DROP INDEX IDX_DB3F5550BF1CD3C3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__requirement AS SELECT uuid, version, category, name, min, max FROM requirement');
        $this->addSql('DROP TABLE requirement');
        $this->addSql('CREATE TABLE requirement (uuid CHAR(36) NOT NULL --(DC2Type:guid)
        , category VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, min DOUBLE PRECISION DEFAULT NULL, max DOUBLE PRECISION DEFAULT NULL, version INTEGER DEFAULT NULL, PRIMARY KEY(uuid))');
        $this->addSql('INSERT INTO requirement (uuid, version, category, name, min, max) SELECT uuid, version, category, name, min, max FROM __temp__requirement');
        $this->addSql('DROP TABLE __temp__requirement');
        $this->addSql('CREATE INDEX IDX_DB3F5550BF1CD3C3 ON requirement (version)');
    }
}
