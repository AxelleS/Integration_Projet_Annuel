<?php

class BaseSql{

    private $table;
    private $pdo;
    private $columns;

    public function __construct(){

        try
        {
            $this->pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPWD);
        }
        catch(Exception $e)
        {
            die('Erreur SQL : '.$e->getMessage());
        }

        $this->table = strtolower(get_called_class());
  
    }

    public function setColumns(){
        $columnsExcluded = get_class_vars(get_class());
        $this->columns = array_diff_key(get_object_vars($this),$columnsExcluded);
    }

    public function majToken(){
        $this->setColumns();
        echo 'mon token : '.$this->columns['token'];echo '<br>';
        $this->pdo->exec("UPDATE user SET token = '".$this->columns['token']."' WHERE id LIKE ".$this->columns['id']);
    }

    //function select avec passage en paramètre du champs sue lequel va s'effectuer la recherche
    public function select($champ_recherche = null){
        $this->setColumns();
        //permet d'aller chercher la valeur du champs où l'on va faire la recherche

        if(is_null($champ_recherche)){
            $response = $this->pdo->query("SELECT * FROM ".$this->table);
        } else {
            $valeur_recherche = $this->columns[$champ_recherche];
            if(is_null($valeur_recherche)){
                $response = $this->pdo->query("SELECT * FROM ".$this->table." WHERE ".$champ_recherche." IS NULL");
            } else{
                $response = $this->pdo->query("SELECT * FROM ".$this->table." WHERE ".$champ_recherche." LIKE '".$valeur_recherche."'");
            }
        }
        // echo "SELECT * FROM ".$this->table." WHERE ".$champ_recherche." LIKE '".$valeur_recherche."'";
        return $response;
    }

    public function delete($champs) {
        $this->setColumns();
            
            $response = $this->pdo->query("DELETE FROM ".$this->table." WHERE".$champs."LIKE ".$this->columns[$champs]);

            return $response;
    }

    public function save(){
        //echo "Enregistrement <br>";
        $this->setColumns();

        if($this->id){
            //Update
            $query_columns = array();
            $id_search = $this->columns['id'];
            
            unset($this->columns['id']);
            foreach($this->columns as $key => $value){
             array_push($query_columns,$key."=:".$key);
            }
            $query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(',',$query_columns)." WHERE id LIKE ".$id_search);

            /*echo "UPDATE ".$this->table." SET ".implode(',',$query_columns)." WHERE id LIKE ".$id_search;
            echo "<br>";
            print_r($this->columns);*/
            $query->execute($this->columns);
        } else{
            //Insert
            unset($this->columns['id']);
            $query = $this->pdo->prepare("INSERT INTO ".$this->table." (".
            implode(',',array_keys($this->columns))
            .") VALUES (:".
            implode(',:',array_keys($this->columns))
            .")");

            /*echo "INSERT INTO ".$this->table." (".
            implode(',',array_keys($this->columns))
            .") VALUES (:".
            implode(',:',array_keys($this->columns))
            .")";
            echo "<br>";*/
            $query->execute($this->columns);
        }
    }
}
