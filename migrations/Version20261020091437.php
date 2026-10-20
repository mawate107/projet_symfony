<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261020091437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD id_client_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D99DED506 ON commande (id_client_id)');
        $this->addSql('ALTER TABLE ligne_commande ADD id_commande_id INT NOT NULL, ADD id_produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B9AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_3170B74B9AF8E3A3 ON ligne_commande (id_commande_id)');
        $this->addSql('CREATE INDEX IDX_3170B74BAABEFE2C ON ligne_commande (id_produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D99DED506');
        $this->addSql('DROP INDEX IDX_6EEAA67D99DED506 ON commande');
        $this->addSql('ALTER TABLE commande DROP id_client_id');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B9AF8E3A3');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BAABEFE2C');
        $this->addSql('DROP INDEX IDX_3170B74B9AF8E3A3 ON ligne_commande');
        $this->addSql('DROP INDEX IDX_3170B74BAABEFE2C ON ligne_commande');
        $this->addSql('ALTER TABLE ligne_commande DROP id_commande_id, DROP id_produit_id');
    }
}
