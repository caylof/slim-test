<?php
namespace app\models;

class Category {
    public function getAll() {
        $data = include __DIR__.'/../../data-test/category.php';
        return $data;
    }

    public function find($id) {
        $allData = $this->getAll();
        foreach ($allData as $data) {
            if ($data['id'] == $id) {
                return $data;
            }
        }
        return null;
    }

    public function add($data) {
        return true;
    }

    public function update($id, $data) {
        return true;
    }

    public function delete($id) {
        return true;
    }

}
