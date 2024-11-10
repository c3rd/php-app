<?php

namespace Domain;

interface IArticleRepository {
    public function all();
    public function create(Article $article);
    public function update(Article $article);
    public function delete(int $id);
}