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
            " SELECT  product.id, product.title, product.description, \n".
            " docprice.datetime, docprice.price_type, docprice.status, \n".
            " docpricebody.doc_id, docpricebody.product_id, docpricebody.price \n".
            " FROM \n".
            " product \n".
            "  LEFT JOIN ( \n".

                        " SELECT docpricebody.product_id \n".
                        " FROM docpricebody, product, docprice \n".
                        " WHERE docpricebody.doc_id IN( \n".
                                    " SELECT dp1.id \n".
                                    " FROM docprice dp1 \n".
                                            " INNER JOIN ( \n".
                                                            " SELECT MAX(docprice.datetime) AS max_date, docprice.price_type, docpricebody.product_id \n".
                                                            " FROM docprice \n".
                                                                    " INNER JOIN docpricebody ON( docprice.id = docpricebody.doc_id ) \n".
                                                            " GROUP BY docpricebody.product_id \n".
                                                            ' HAVING max_date <= date("' .$date. '") AND ( docprice.price_type = "'. $priceType .'")' . "\n".
                                                        ") dp2 ON ( dp1.datetime = dp2.max_date )  \n".
                                                      ") \n".
                        " AND docpricebody.product_id = product.id  \n".
                        " AND docpricebody.doc_id = docprice.id \n".

             ") dpb ON ( dpb.product_id = product.id )  \n".

            " LEFT JOIN docpricebody ON( product.id = docpricebody.product_id ) \n".
            " LEFT JOIN docprice     ON( docprice.id = docpricebody.doc_id  ) \n".

            " WHERE \n".
            " docpricebody.product_id IS NULL \n".
            " OR dpb.product_id IS NOT NULL \n"
        ;

        return  $params = $this->query($sql);
    }

}
?>