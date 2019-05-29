<?php
include_once 'DbConnect.php';

$con = get_db();

$book = pg_escape_string($_POST['book']);
$chapter = pg_escape_string($_POST['chapter']);
$verse = pg_escape_string($_POST['verse']);
$content = pg_escape_string($_POST['content']);


if (isset($_POST['1'])){
    $topic_faith = 1;
}
if (isset($_POST['2'])){
    $topic_sacrifice = 2;
}
if (isset($_POST['3'])){
    $topic_charity = 3;
}


$item_id = 1 ;


$query = 'SELECT id FROM scriptures';
$result = pg_query( $con, $query);


while($rows = pg_fetch_assoc($result))
{
    $item_id ++;
}


$sql = "INSERT INTO scriptures(id, book, chapter, verse, content)
VALUES($item_id, '$book', $chapter, $verse, '$content');";
pg_query($con ,$sql);




$sql2 = "INSERT INTO scripture_and_topic(srip_id, topic_id)
             VALUES($item_id, $topic_charity;";
pg_query($con, $sql2);

$sql3 = "INSERT INTO scripture_and_topic(srip_id, topic_id)
             VALUES($item_id, $topic_faith;";
pg_query($con, $sql3);

$sql4 = "INSERT INTO scripture_and_topic(srip_id, topic_id)
             VALUES($item_id, $topic_sacrifice;";
pg_query($con, $sql4);


pg_close($con);

header("Location: 06Teach.php?insert=Success");
