<style>

    *{
        font-family:'courier new';
    }
</style>

<!-- 註解掉的部分是因為當此程式碼要複製到reg_form.php時，在fuction本地端會執行一次，重複顯示，故註解掉 -->
<!-- 
<form action="?">
    <input type="number"name='line'>
    <button typt='submit'>submit</button>
</form>
 -->

 <?php
// $line = (isset($_GET['line']))?$_GET['line']:5;

// starts($line);

function starts($shape,$line){
switch($shape){
    case "正三角形":
    for($i=0;$i<$line;$i++){

    for($k=0;$k<($line-1-$i);$k++){
        echo "&nbsp;";
    }     

    for($j=0;$j<(2*$i+1);$j++){
    //for($j=0;$j<=$i;$j++){
        echo "*";
    }
    echo "<br>";
}
break;
    case "菱形":
    for($i=0;$i<$line;$i++){
        if($i>floor($line/2)){
            $k1=$i-(floor($line/2));
            $j1=2*($i-(2*($i-(floor($line/2)))))+1;
        }else{
            $k1=(floor($line/2))-$i;
            $j1=(2*$i+1);
        }
    
        for($k=0;$k<$k1;$k++){
            echo "&nbsp;";
        }
    
        for($j=0;$j<$j1;$j++){
            echo "*";
        }
        echo "<br>";
    
    }
    break;  
}
}


// all()-給定資料表名後，會回傳整個資料表的資料
/*
使用function的好處
1.簡化程式碼
2.削減重複
3.方便維護
*/

/**
 * 建立資料庫的連線變數
 * @param string $db 資料庫名稱
 * @return object (object指的是 物件 )
 */
function pdo($db){
    $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
    $pdo=new PDO($dsn,'root','');
    // ↓ 拿到整個資料庫的資料
    $sql="select * from $table";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    // 把$rows這個變數，傳回all($table)裡面的$table
    return $rows;
}





/***
 * 回傳指定資料表的所有資料
 * @param string $table 資料表名稱
 * @return array
 */

function all($table){
    $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
    $pdo=new PDO($dsn,'root','');
    // ↓ 拿到整個資料庫的資料
    $sql="select * from $table";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    // 把$rows這個變數，傳回all($table)裡面的$table
    return $rows;
}

/**
 * 回傳指定資料表的特定ID的單筆資料
 * @param string $table 資料表名稱
 * @param integer $id || array $id 資料表ID
 * @return array
*/


function find($table,$id){
    //↓$pdo移到最上面，因為每個都會用到
    $pdo=$pdo=pdo('crud');
    // 現在這邊的id是一個"陣列" 很重要 他現在不是數字
    if(is_array($id)){
        $tmp=[];
        foreach($id as $key => $value){
            // sprintf("`%s`"='%s'",$key,$value);
            //↑代表把 這個 $value 帶入s
            //↓代表這個陣列是空的，從0開始代入
            $tmp[]="`$key`='$value'";
        }
        $sql="select * from $table where ".join(" && ",$tmp);
        
    }else{      
        $sql="select * from $table where id='$id'";
    }
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    return $row;
}
    

/**
 * 列出陣列內容
 */
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


?>  