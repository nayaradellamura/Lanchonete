<?php
require_once '../app/models/Produto.php';
require_once '../app/core/Database.php';

class ProdutoDAO {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM produtos");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Produto");
    }

    public function inserir($produto) {
        $stmt = $this->db->prepare("INSERT INTO produtos (nome, descricao, preco, quantidade, imagem, categoria) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$produto->nome, $produto->descricao, $produto->preco, $produto->quantidade, $produto->imagem, $produto->categoria]);
    }

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function dadosGrafico() {
        $stmt = $this->db->query("SELECT p.nome, SUM(v.quantidade) as total FROM vendas v JOIN produtos p ON v.produto_id = p.id GROUP BY p.nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject("Produto"); // Retorna um objeto Produto ou false se não achar
    }
    
    public function atualizar($produto) {
        $stmt = $this->db->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, quantidade = ?, imagem = ?, categoria = ? WHERE id = ?");
        $stmt->execute([
            $produto->nome,
            $produto->descricao,
            $produto->preco,
            $produto->quantidade,
            $produto->imagem,
            $produto->categoria,
            $produto->id
        ]);
    }
    
}
