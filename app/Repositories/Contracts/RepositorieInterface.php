<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function getAll(); // RETORNA TODOS OS REGISTROS
    public function findById($id); // RETRONA OS DADOS PELO "ID"
    public function findWhere($column, $valor); // RETRONA TODOS OS REGISTROS ESPECÍFICO DE UMA COLUNA
    public function findWhereFirst($column, $valor); // RETRONA APENAS O PRIMEIRO REGISTRO DE UMA COLUNA
    public function paginate($totalPage = 10); // RETORNA TODOS OS DADOS PAGINADOS
    public function store(array $data); // CRIA UM REGISTRO
    public function update($id, array $data); // EDITA UM REGISTRO
    public function destroy($id); // DELETA UM REGISTRO
}