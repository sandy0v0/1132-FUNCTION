<style>

    *{
        font-family:'courier new';
    }
</style>
<!-- 
<form action="?">
    <input type="number"name='line'>
    <button typt='submit'>submit</button>
</form>
 -->

 <?php
// $line = (isset($_GET['line']))?$_GET['line']:5;

// starts($line);

function starts($line){

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
}
?>