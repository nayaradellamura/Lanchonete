<?php
require_once '../app/core/Database.php';
require_once '../app/models/Venda.php';

class VendaDAO {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function inserir(Venda $venda) {
        $stmt = $this->db->prepare("INSERT INTO vendas (produto_id, quantidade) VALUES (?, ?)");
        $stmt->execute([$venda->produto_id, $venda->quantidade]);
    }
}
