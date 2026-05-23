<?php

require_once KOREN . '/app/jadro/Databaza.php';

class Clanok
{
    private PDO $db;

    public function __construct()
    {
        $databaza = new Databaza();
        $this->db = $databaza->dajSpojenie();
    }

    public function dajVsetkyPublikovane(): array
    {
        $sql = "SELECT c.*, p.meno AS autor
                FROM clanky c
                LEFT JOIN pouzivatelia p ON c.pouzivatel_id = p.id
                WHERE c.publikovany = 1
                ORDER BY c.id DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function dajVsetkyAdmin(): array
    {
        $sql = "SELECT c.*, p.meno AS autor
                FROM clanky c
                LEFT JOIN pouzivatelia p ON c.pouzivatel_id = p.id
                ORDER BY c.id DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function dajJedenPodlaId(int $id): array|false
    {
        $sql = "SELECT c.*, p.meno AS autor
                FROM clanky c
                LEFT JOIN pouzivatelia p ON c.pouzivatel_id = p.id
                WHERE c.id = :id AND c.publikovany = 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public function dajJedenAdmin(int $id): array|false
    {
        $sql = "SELECT * FROM clanky WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public function pridaj(array $data): bool
    {
        $sql = "INSERT INTO clanky (pouzivatel_id, nazov, perex, obsah, publikovany)
                VALUES (:pouzivatel_id, :nazov, :perex, :obsah, :publikovany)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'pouzivatel_id' => $data['pouzivatel_id'],
            'nazov' => $data['nazov'],
            'perex' => $data['perex'],
            'obsah' => $data['obsah'],
            'publikovany' => $data['publikovany']
        ]);
    }

    public function uprav(int $id, array $data): bool
    {
        $sql = "UPDATE clanky
                SET nazov = :nazov,
                    perex = :perex,
                    obsah = :obsah,
                    publikovany = :publikovany
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'nazov' => $data['nazov'],
            'perex' => $data['perex'],
            'obsah' => $data['obsah'],
            'publikovany' => $data['publikovany']
        ]);
    }

    public function zmaz(int $id): bool
    {
        $sql = "DELETE FROM clanky WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }
}