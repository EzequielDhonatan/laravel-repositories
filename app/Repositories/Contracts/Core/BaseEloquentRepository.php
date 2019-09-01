<?php

namespace App\Repositories\Core;
use App\Repositories\Contracts\RepositorieInterface;
use App\Repositories\Exceptions\NoEntityDefined;

class BaseEloquentRepository implements RepositorieInterface
{
    private $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    ## RETORNA TODOS OS REGISTROS
    public function getAll()
    {
        return $this->entity->get();
    }

    ## RETRONA OS DADOS PELO "ID"
    public function findById($id)
    {
        return $this->entity->find($id);
    } 

    ## RETRONA TODOS OS REGISTROS ESPECÍFICO DE UMA COLUNA
    public function findWhere($column, $valor)
    {
        return $this->entity
                            ->where($column, $valor)
                            ->get();
    }

    ## RETRONA APENAS O PRIMEIRO REGISTRO DE UMA COLUNA
    public function findWhereFirst($column, $valor)
    {
        return $this->entity
                            ->where($column, $valor)
                            ->first();
    }

    ## RETORNA TODOS OS DADOS PAGINADOS
    public function paginate($totalPage = 10)
    {
        return $this->entity->paginate($totalPage = 10);
    }

    ## CRIA UM REGISTRO
    public function store(array $data)
    {
        return $this->entity->create($data);
    }

    ## EDITA UM REGISTRO
    public function update($id, array $data)
    {
        $entity = $this->findById($id);

        return $entity->update($data);
    }

    ## DELETA UM REGISTRO
    public function delete($id)
    {
        return $this->entity->find($id)->delete();
    }

    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined;
        }

        return app($this->entity());
    }

}