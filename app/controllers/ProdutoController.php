<?php 
require_once '../app/core/Controller.php';
require_once '../app/dao/ProdutoDAO.php';
require_once '../app/dao/VendaDAO.php';
require_once '../app/models/Produto.php'; 

class ProdutoController extends Controller {
    private $dao;
    private $vendaDao;

    public function __construct() {
        if (!isset($_SESSION['logado'])) header("Location: index.php");
        $this->dao = new ProdutoDAO();
        $this->vendaDao = new VendaDAO();
    }

    // Listar produtos
    public function index() {
        $produtos = $this->dao->listar();
        $this->view('produtos', ['produtos' => $produtos]);
    }

    // Exibir formulário para cadastro
    public function create() {
        $this->view('formProduto');
    }

    // Salvar novo produto
    public function store() {
        $produto = new Produto();
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->preco = $_POST['preco'];
        $produto->quantidade = $_POST['quantidade'];
        $produto->categoria = $_POST['categoria'];

        if (!empty($_FILES['imagem']['name'])) {
            $imagem = $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], "../uploads/" . $imagem);
            $produto->imagem = $imagem;
        } else {
            $produto->imagem = null; // ou um valor padrão
        }

        $this->dao->inserir($produto);
        header("Location: index.php?controller=Produto&action=index");
    }

    // Excluir produto (recebe id via GET)
    public function delete() {
        $id = $_GET['id'];
        $this->dao->excluir($id);
        header("Location: index.php?controller=Produto&action=index");
    }

    // Formulário para edição (busca dados pelo id)
    public function edit() {
        $id = $_GET['id'];
        $produto = $this->dao->buscarPorId($id);
        if ($produto) {
            $this->view('formProduto', ['produto' => $produto]);
        } else {
            header("Location: index.php?controller=Produto&action=index");
        }
    }

    // Atualizar produto
    public function update() {
        $id = $_POST['id'];

        $produto = new Produto();
        $produto->id = $id;
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->preco = $_POST['preco'];
        $produto->quantidade = $_POST['quantidade'];
        $produto->categoria = $_POST['categoria'];

        if (!empty($_FILES['imagem']['name'])) {
            $imagem = $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], "../uploads/" . $imagem);
            $produto->imagem = $imagem;
        } else {
            $produtoExistente = $this->dao->buscarPorId($id);
            $produto->imagem = $produtoExistente->imagem;
        }

        $this->dao->atualizar($produto);
        header("Location: index.php?controller=Produto&action=index");
    }

    // método de gráfico
    public function grafico() {
        $dados = $this->dao->dadosGrafico();
        $this->view('grafico', ['dados' => $dados]);
    }

     // Mostrar tela de venda
    public function venda() {
        $produtos = $this->dao->listar();
        $this->view('formVenda', ['produtos' => $produtos]);
    }

    // Salvar venda
    public function storeVenda() {
        $produto_id = $_POST['produto_id'];
        $quantidade = $_POST['quantidade'];

        if ($produto_id && $quantidade > 0) {
            $venda = new Venda();
            $venda->produto_id = $produto_id;
            $venda->quantidade = $quantidade;

            $this->vendaDao->inserir($venda);
        }

        header("Location: index.php?controller=Produto&action=venda");
    }

}
