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
        //echo 'mon token : '.$this->columns['token'];echo '<br>';
        $this->pdo->exec("UPDATE user SET token = '".$this->columns['token']."' WHERE id LIKE ".$this->columns['id']);
    }

    //function select avec passage en paramètre du champs sur lequel va s'effectuer la recherche
    public function select($champ_recherche = null, $order = 'ASC'){
        $this->setColumns();
        //permet d'aller chercher la valeur du champs où l'on va faire la recherche

        if(is_null($champ_recherche)){
            $response = $this->pdo->query(" SELECT * FROM ".$this->table." ORDER BY id ".$order);
            //echo "SELECT * FROM ".$this->table." ORDER BY id ".$order;
        } else {
            if(!is_array($champ_recherche)) {
                $valeur_recherche = $this->columns[$champ_recherche];
                if(is_null($valeur_recherche)){
                    $response = $this->pdo->query("SELECT * FROM ".$this->table." WHERE ".$champ_recherche." IS NULL ORDER BY id ".$order);
                } else{
                    if(isset($this->columns['foreign']) && $this->colums['foreign'] != ""){$response = $this->pdo->query(" SELECT * FROM ".$this->table." LEFT JOIN ".$this->columns['foreign']." ON ".$this->columns['table'].".".$champ_recherche." = ".$this->columns['foreign'].".id WHERE ".$champ_recherche." LIKE '".$valeur_recherche."' ORDER BY id ".$order);
                    }else{

                        $response = $this->pdo->query(" SELECT * FROM ".$this->table." WHERE ".$champ_recherche." LIKE '".$valeur_recherche."' ORDER BY id ".$order);
                    }
                }
            } else {
                foreach ($champ_recherche as $champ) {
                    $valeur_recherche[] = $this->columns[$champ];
                }
                switch (count($champ_recherche)) {
                    case 2:
                        $response = $this->pdo->query("SELECT * FROM ".$this->table." WHERE ".$champ_recherche[0]." LIKE '".$valeur_recherche[0]."' AND ".$champ_recherche[1]." LIKE '".$valeur_recherche[1]."' ORDER BY id ".$order);
                        break;
                    case 3:
                        $response = $this->pdo->query("SELECT * FROM ".$this->table." WHERE ".$champ_recherche[0]." LIKE '".$valeur_recherche[0]."' AND ".$champ_recherche[1]." LIKE '".$valeur_recherche[1]."' AND ".$champ_recherche[2]." LIKE '".$valeur_recherche[2]."' ORDER BY id ".$order);
                        break;
                    case 4:
                        $response = $this->pdo->query("SELECT * FROM ".$this->table." WHERE ".$champ_recherche[0]." LIKE '".$valeur_recherche[0]."' AND ".$champ_recherche[1]." LIKE '".$valeur_recherche[1]."' AND ".$champ_recherche[2]." LIKE '".$valeur_recherche[2]."' AND ".$champ_recherche[3]." LIKE '".$valeur_recherche[3]."' ORDER BY id ".$order);
                        break;
                }

            }

            //echo "SELECT * FROM ".$this->table." LEFT JOIN ".$this->columns['foreign']." ON ".$this->columns['table'].".".$champ_recherche." = ".$this->columns['foreign'].".id WHERE ".$champ_recherche." LIKE '".$valeur_recherche."' ORDER BY id ".$order";
        }
        // echo "SELECT * FROM ".$this->table." LEFT JOIN ".$this->columns['foreign']." ON ".$this->columns['table'].".".$champ_recherche." = ".$this->columns['foreign'].".id WHERE ".$champ_recherche." LIKE '".$valeur_recherche."' ORDER BY id ".$order";
        return $response;
    }

    public function count($champ_recherche = null, $order = 'ASC'){

        $this->setColumns();
        //permet d'aller chercher la valeur du champs où l'on va faire la recherche

        if(is_null($champ_recherche)){
            $response = $this->pdo->query(" SELECT count(*) FROM ".$this->table." ORDER BY id ".$order);
            //echo "SELECT count(*) FROM ".$this->table." ORDER BY id ".$order;
        } else {
            if(!is_array($champ_recherche)) {
                $valeur_recherche = $this->columns[$champ_recherche];
                if(is_null($valeur_recherche)){
                    $response = $this->pdo->query("SELECT count(*) FROM ".$this->table." WHERE ".$champ_recherche." IS NULL ORDER BY id ".$order);
                } else{
                    if(isset($this->columns['foreign']) && $this->colums['foreign'] != ""){$response = $this->pdo->query(" SELECT count(*) FROM ".$this->table." LEFT JOIN ".$this->columns['foreign']." ON ".$this->columns['table'].".".$champ_recherche." = ".$this->columns['foreign'].".id WHERE ".$champ_recherche." LIKE '".$valeur_recherche."' ORDER BY id ".$order);
                    }else{

                        $response = $this->pdo->query(" SELECT count(*) FROM ".$this->table." WHERE ".$champ_recherche." LIKE '".$valeur_recherche."' ORDER BY id ".$order);
                    }
                }
            } else {
                foreach ($champ_recherche as $champ) {
                    $valeur_recherche[] = $this->columns[$champ];
                }
                switch (count($champ_recherche)) {
                    case 2:
                        $response = $this->pdo->query("SELECT count(*) FROM ".$this->table." WHERE ".$champ_recherche[0]." LIKE '".$valeur_recherche[0]."' AND ".$champ_recherche[1]." LIKE '".$valeur_recherche[1]."' ORDER BY id ".$order);
                        break;
                    case 3:
                        $response = $this->pdo->query("SELECT count(*) FROM ".$this->table." WHERE ".$champ_recherche[0]." LIKE '".$valeur_recherche[0]."' AND ".$champ_recherche[1]." LIKE '".$valeur_recherche[1]."' AND ".$champ_recherche[2]." LIKE '".$valeur_recherche[2]."' ORDER BY id ".$order);
                        break;
                    case 4:
                        $response = $this->pdo->query("SELECT count(*) FROM ".$this->table." WHERE ".$champ_recherche[0]." LIKE '".$valeur_recherche[0]."' AND ".$champ_recherche[1]." LIKE '".$valeur_recherche[1]."' AND ".$champ_recherche[2]." LIKE '".$valeur_recherche[2]."' AND ".$champ_recherche[3]." LIKE '".$valeur_recherche[3]."' ORDER BY id ".$order);
                        break;
                }

            }

            //echo "SELECT count(*) FROM ".$this->table." LEFT JOIN ".$this->columns['foreign']." ON ".$this->columns['table'].".".$champ_recherche." = ".$this->columns['foreign'].".id WHERE ".$champ_recherche." LIKE '".$valeur_recherche."' ORDER BY id ".$order";
        }
        // echo "SELECT count(*) FROM ".$this->table." LEFT JOIN ".$this->columns['foreign']." ON ".$this->columns['table'].".".$champ_recherche." = ".$this->columns['foreign'].".id WHERE ".$champ_recherche." LIKE '".$valeur_recherche."' ORDER BY id ".$order";
        return $response;   
    }

    public function delete($champs) {
        $this->setColumns();

        //echo "DELETE FROM ".$this->table." WHERE ".$champs." LIKE ".$this->columns[$champs];
        $this->pdo->query("DELETE FROM ".$this->table." WHERE ".$champs." LIKE ".$this->columns[$champs]);
    }

    public function save(){
        //echo "Enregistrement <br>";
        $this->setColumns();

        if($this->id){
            $unsetColumns = ['id', 'roomList', 'foreign', 'token', 'date_inserted'];
            //Update
            $query_columns = array();
            $id_search = $this->columns['id'];

            if(isset($this->columns['password']) && $this->columns['password'] == '') {
                $unsetColumns[] = 'password';
            }

            foreach($this->columns as $key => $value){
                if(!in_array($key, $unsetColumns)) {
                    array_push($query_columns, $key . "=:" . $key);
                } else {
                    unset($this->columns[$key]);
                }
            }
            $query = $this->pdo->prepare("  UPDATE ".$this->table." SET ".implode(',',$query_columns)." WHERE id LIKE ".$id_search);

            $query->execute($this->columns);
        } else{
            //Insert
            $unsetColumns = ['id', 'roomList', 'foreign'];
            foreach($unsetColumns as $column){
                unset($this->columns[$column]);
            }
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
            
            print_r($this->columns);*/

            $query->execute($this->columns);
        }
    }
}
