<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190116144038 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE artiste_projet (artiste_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_A646AA821D25844 (artiste_id), INDEX IDX_A646AA8C18272 (projet_id), PRIMARY KEY(artiste_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet_categorie (projet_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_6A8331E0C18272 (projet_id), INDEX IDX_6A8331E0BCF5E72D (categorie_id), PRIMARY KEY(projet_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste_projet ADD CONSTRAINT FK_A646AA821D25844 FOREIGN KEY (artiste_id) REFERENCES Artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_projet ADD CONSTRAINT FK_A646AA8C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_categorie ADD CONSTRAINT FK_6A8331E0C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_categorie ADD CONSTRAINT FK_6A8331E0BCF5E72D FOREIGN KEY (categorie_id) REFERENCES Categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY artiste_ibfk_1');
        $this->addSql('DROP INDEX projet_id ON artiste');
        $this->addSql('ALTER TABLE artiste DROP projet_id');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY projet_ibfk_1');
        $this->addSql('DROP INDEX categorie_id ON projet');
        $this->addSql('ALTER TABLE projet DROP categorie_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE artiste_projet');
        $this->addSql('DROP TABLE projet_categorie');
        $this->addSql('ALTER TABLE Artiste ADD projet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Artiste ADD CONSTRAINT artiste_ibfk_1 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('CREATE INDEX projet_id ON Artiste (projet_id)');
        $this->addSql('ALTER TABLE projet ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT projet_ibfk_1 FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX categorie_id ON projet (categorie_id)');
    }
}
