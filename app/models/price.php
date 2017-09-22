<?php
namespace app\models;
use config;
use Exception;

class Price{

    private $host;
    private $name;
    private $password;
    private $database;
    public $db;
    public $query;

    public function __construct ($host, $user, $psw, $db)
    {
        $this->host=$host;
        $this->name=$user;
        $this->password=$psw;
        $this->database=$db;

        if (!($this->db=mysqli_connect($this->host,$this->name,$this->password))){
            throw new Exception ("Can't connect to the server.");
        }
        if (!mysqli_select_db($this->db, $this->database)){
            throw new Exception ("Can't connect to DB.");
        }
        return $this->db;
    }

    public function query($sqlQuery, $getType = "assoc")
    {
        if (!($result = mysqli_query($this->db, $sqlQuery))){
            throw new Exception ("Can't execute query.".mysql_error());
        }
        $resultType = MYSQL_NUM;
        if ("assoc" == $getType) {
            $resultType = MYSQL_ASSOC;
        }
        while ($row = mysqli_fetch_array($result, $resultType)){
            $res[] = $row;
        }
        return $res;
    }

    public function getPriceType(){
        $this->query( "SET CHARSET utf8" );
        $sql = 'SELECT DISTINCT price_type FROM docprice ORDER BY price_type';

        return  $params = $this->query($sql);
    }

    public function getPriceList(){
        $this->query( "SET CHARSET utf8" );

        $priceType = $_POST['price_type'];
        $date = date('Y-m-d', strtotime($_POST['date']));

        $sql =
            " SELECT * \n".
            " FROM product p \n".
                " LEFT JOIN ( \n".

                                " SELECT maxd.product_id, db.price \n".
                                " FROM \n".
                                    " (SELECT db.product_id, max(d.datetime) max_date \n".
                                    " FROM docprice d \n".
                                                        " INNER JOIN docpricebody db ON d.id = db.doc_id \n".
                                                        ' WHERE d.datetime <= date("' .$date. '") AND d.price_type = "'. $priceType .'"' . "\n".
                                                        " GROUP BY db.product_id \n".
                                     ") maxd \n".
                                    " JOIN docpricebody db ON db.product_id = maxd.product_id \n".
                                    " JOIN docprice d \n".
                                            ' ON d.id = db.doc_id AND d.datetime=maxd.max_date AND d.price_type = "'. $priceType .'"' . "\n".
                            ") price ON price.product_id=p.id \n".

            " WHERE price.product_id IS NOT NULL OR NOT EXISTS(SELECT 1 FROM docpricebody db WHERE db.product_id = p.id)"
        ;

        return  $params = $this->query($sql);
    }

}
?>