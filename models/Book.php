<?php

class Book {

    public static function findById ( $id ) {

        global $pdo;

        $stmt = $pdo->prepare('SELECT * FROM books WHERE id=:id');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();

    }

    public static function findAll () {

        global $pdo;

        $stmt = $pdo->prepare('SELECT * FROM books');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public function update () {

        global $pdo;

        $aBook = (array)$this;
        unset($aBook['id']);

        $sqlStr = 'UPDATE books SET ';
        
        $objectValues = [];
        foreach ($aBook as $key => $value) {
            $objectValues[] = $key . '=:' . $key;
        }

        $sqlStr .= implode(', ', $objectValues);

//        var_dump();
        $stmt = $pdo->prepare($sqlStr);
        return $stmt->execute($aBook);
    }

    public function delete () {

        global $pdo;

        $stmt = $pdo->prepare('DELETE FROM books WHERE id=:id');
        return $stmt->execute(['id' => $this->id]);
    }


}
