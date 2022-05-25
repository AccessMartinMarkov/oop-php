<?php

function connection() {
  $database = require 'db_config.php';
  return new PDO($database['db_dns'], $database['user_name'], $database['password']);
}

function get_people() {
  $pdo = connection();
  $results = $pdo->query('SELECT * FROM people_names');
  return $results->fetchAll();
}

function get_person($id) {
  $pdo = connection();
  $stm = $pdo->prepare('SELECT * FROM people_data WHERE id = :id');
  $stm->execute(['id' => $id]);
  return $stm->fetchAll();
}

function update_person($data) {
  $name = $data['name'] ? : NULL;
  $age = $data['age'] ? : NULL;
  $sex = $data['sex'] ? : NULL;
  $icon = $data['icon'] ? : NULL;
  $id = $data['id'];

  $pdo = connection();
  $stm = $pdo->prepare('UPDATE people_data SET name = :name, age = :age, sex = :sex, icon = :icon WHERE id = :id');
  $stm->execute([
    ':name' => $name,
    ':age' => $age,
    ':sex' => $sex,
    ':icon' => $icon,
    ':id' => $id
  ]);
}

function delete_person_info($id, $path) {
  $pdo = connection();
  $stm = $pdo->prepare('DELETE FROM people_data WHERE id = :id');
  $stm->execute(['id' => $id]);
  unlink($path);
}

function save_person($person) {
  $name = $person['name'] ? : NULL;
  $age = $person['age'] ? : NULL;
  $sex = $person['sex'] ? : NULL;
  $icon = $person['icon'] ? : NULL;

  $pdo = connection();
  $stm = $pdo->prepare('INSERT INTO people_data (name, age, sex, icon) VALUES (:name, :age, :sex, :icon)');
  $stm->execute([
    ':name' => $name,
    ':age' => $age,
    ':sex' => $sex,
    ':icon' => $icon,
  ]);
}
