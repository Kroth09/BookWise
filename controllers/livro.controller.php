<?php

$livro = $DB
    ->query("
            select
                l.id , l.titulo , l.autor, l.descricao, l.ano_de_lancamento, 
                round(sum(a.nota) / 5) as nota_avaliacao,
	            count(a.id) as count_avaliacoes
            from
	            livros l
            left join avaliacoes a on	a.livro_id = l.id
            where l.id = :id
            group by l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento
            ", Livro::class, [':id' => $_GET['id']])
    ->fetch();


$avaliacoes = $DB
    ->query("select * from avaliacoes where livro_id = :id", Avaliacao::class, ['id' =>$_GET['id']])
    ->fetchAll();


view('livro', compact('livro', 'avaliacoes'));