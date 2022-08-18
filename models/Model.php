<?php
abstract class Model {
    private static $_bdd;

    private static function setBdd() {
        $host = "127.0.0.1";
        $name = "oburger-mvc";
        $login = "root";
        $pw = "";
        self::$_bdd = new PDO("mysql:host=localhost;dbname=oburger-mvc;charset=utf8", "root", "");
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd() {
        if(self::$_bdd == null) {
            self::setBdd();
        }
        return self::$_bdd;
    }

    protected function getAll($table, $obj) {
        $var = [];
        $req = $this->getBdd()->prepare('select * from '.$table.' order by id');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
    }

    protected function get($table, $obj, $col, $val) {
        $req = $this->getBdd()->prepare('select * from '.$table.' where '.$col.' = ?');
        $req->execute(array($val));
        return new $obj($req->fetch());
    }

    protected function add($table, $data) { 
        foreach($data as $field => $v) {
            $ins[] = ':' . $field;
        }

        $ins = implode(',', $ins);
        $fields = implode(',', array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

        $req = $this->getBdd()->prepare($sql);
        foreach($data as $f => $v) {
            $req->bindValue(':' . $f, $v);
        }
        if($req->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($table,  $values, $where) {
        $prep = array();
        foreach($values as $k => $v ) {
            $prep[$k.' = :'.$k] = $v;
        }
        foreach($where as $w => $v) {
            $whereKey = array_keys($where);
        }
        $req = $this->getBdd()->prepare("UPDATE ".$table." SET ".  implode(', ',array_keys($prep)) ."  WHERE ".$whereKey[0]."= :".$whereKey[0]);
        $values += $where;
        $req->execute($values);
    }

    public function delete($table, $where) {
        foreach($where as $w => $v) {
            $whereKey = array_keys($where);
        }
        $req = $this->getBdd()->prepare("DELETE FROM ".$table." WHERE ".$whereKey[0]."= :".$whereKey[0]);
        return $req->execute($where);
    }

    public function search($table, $obj, $where) {
        $var = [];
        foreach($where as $w => $v) {
            $whereKey = array_keys($where);
        }
        $req = $this->getBdd()->prepare("SELECT * FROM ".$table." WHERE ".$whereKey[0]." LIKE ?");
        $req->execute(array('%'.$where[$whereKey[0]].'%'));
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
    }
}
?>