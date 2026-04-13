<?php
class DB
{
    private $db;

    public function __construct(){
        $this->db = new PDO('sqlite:database.sqlite');
    }


    /**
     * Retorna todos os livros do Banco de Dados
     *
     * @return array[Livro]
     */


    public function livros(){

        $query = $this->db->query('SELECT * FROM livros');
        $itens = $query->fetchAll();
        $retorno = [];
        foreach($itens as $itens){
            $livro = new Livro;
            $livro->id = $itens['id'];
            $livro->titulo = $itens['titulo'];
            $livro->autor = $itens['autor'];
            $livro->descricao = $itens['descricao'];

            $retorno[] = $livro;
        }

        return $retorno;
    }

public function livro($id){

    $db = new PDO('sqlite:database.sqlite');
    $sql = "select * from livros";
    $sql .= " where id = " . $id;

    $query = $this->db->query($sql);
    $itens = $query->fetchAll();
    $retorno = [];
    foreach($itens as $itens){
        $livro = new Livro;
        $livro->id = $itens['id'];
        $livro->titulo = $itens['titulo'];
        $livro->autor = $itens['autor'];
        $livro->descricao = $itens['descricao'];

        $retorno[] = $livro;
    }

    return $retorno[0];
}


}