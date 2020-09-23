<?php

interface DAOInterface
{
    public function findAll(): array;

    public function findOneById(int $id): array;

    public function insertOne(array $data): int;

    public function deleteOneById(int $id): bool;

    public function updateOne(array $data): bool;
}