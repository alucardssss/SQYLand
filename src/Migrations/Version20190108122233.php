<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190108122233 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, nom VARCHAR(60) NOT NULL, email VARCHAR(60) NOT NULL, mdp VARCHAR(64) NOT NULL, type VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, date_inscription DATETIME NOT NULL, date_connexion DATETIME NOT NULL, INDEX IDX_9C07354FC18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, artiste_id INT DEFAULT NULL, groupe_id INT DEFAULT NULL, projet_id INT NOT NULL, code VARCHAR(20) NOT NULL, famille VARCHAR(20) NOT NULL, nom VARCHAR(60) NOT NULL, INDEX IDX_497DD63421D25844 (artiste_id), INDEX IDX_497DD6347A45358C (groupe_id), INDEX IDX_497DD634C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenu (id INT AUTO_INCREMENT NOT NULL, image_pano_head VARCHAR(60) NOT NULL, image_pano_presentation VARCHAR(60) NOT NULL, image_pano_contact VARCHAR(60) NOT NULL, image_pano_inscription VARCHAR(60) NOT NULL, image_pano_connexion VARCHAR(60) NOT NULL, image_pano_resultat VARCHAR(60) NOT NULL, summary_text1 LONGTEXT NOT NULL, summary_lien1 VARCHAR(90) NOT NULL, summary_bouton1 VARCHAR(20) NOT NULL, summary_text2 LONGTEXT NOT NULL, summary_lien2 VARCHAR(90) NOT NULL, summary_bouton2 VARCHAR(20) NOT NULL, presentation_image VARCHAR(90) NOT NULL, presentation_text LONGTEXT NOT NULL, mentions LONGTEXT NOT NULL, presse LONGTEXT NOT NULL, presse_doc VARCHAR(90) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, artiste_id INT DEFAULT NULL, projet_id INT DEFAULT NULL, nom VARCHAR(60) NOT NULL, resume LONGTEXT NOT NULL, image_profil VARCHAR(90) NOT NULL, lien_facebook VARCHAR(90) DEFAULT NULL, lien_twitter VARCHAR(90) DEFAULT NULL, lien_youtube VARCHAR(90) DEFAULT NULL, lien_soundcloud VARCHAR(90) DEFAULT NULL, lien_linkedin VARCHAR(90) DEFAULT NULL, lien_perso VARCHAR(90) DEFAULT NULL, INDEX IDX_4B98C2121D25844 (artiste_id), INDEX IDX_4B98C21C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, expediteur VARCHAR(60) NOT NULL, sujet VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, liste LONGTEXT NOT NULL, fichier VARCHAR(90) NOT NULL, nouveau TINYINT(1) DEFAULT NULL, en_cours TINYINT(1) DEFAULT NULL, termine TINYINT(1) DEFAULT NULL, archive TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, artiste_id INT DEFAULT NULL, nom VARCHAR(60) NOT NULL, resume LONGTEXT NOT NULL, valider TINYINT(1) NOT NULL, image_logo1 VARCHAR(60) DEFAULT NULL, image_logo2 VARCHAR(60) DEFAULT NULL, image_logo3 VARCHAR(60) DEFAULT NULL, image1 VARCHAR(60) DEFAULT NULL, image2 VARCHAR(60) DEFAULT NULL, image3 VARCHAR(60) DEFAULT NULL, lien_facebook VARCHAR(90) DEFAULT NULL, lien_twitter VARCHAR(90) DEFAULT NULL, lien_youtube VARCHAR(90) DEFAULT NULL, lien_soundcloud VARCHAR(90) DEFAULT NULL, lien_linkedin VARCHAR(90) DEFAULT NULL, lien_perso VARCHAR(90) DEFAULT NULL, iframe_son1 VARCHAR(90) DEFAULT NULL, iframe_son2 VARCHAR(90) DEFAULT NULL, iframe_son3 VARCHAR(90) DEFAULT NULL, iframe_video1 VARCHAR(90) DEFAULT NULL, iframe_video2 VARCHAR(90) DEFAULT NULL, iframe_video3 VARCHAR(90) DEFAULT NULL, INDEX IDX_50159CA921D25844 (artiste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354FC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD63421D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6347A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C2121D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA921D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD63421D25844');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C2121D25844');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA921D25844');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6347A45358C');
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354FC18272');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634C18272');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21C18272');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE contenu');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE projet');
    }
}
