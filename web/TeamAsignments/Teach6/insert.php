<?php
include_once 'DbConnect.php';

$con = get_db();

$book = pg_escape_string($_POST['book']);
$chapter = pg_escape_string($_POST['chapter']);
$verse = pg_escape_string($_POST['verse']);
$content = pg_escape_string($_POST['content']);
$topic_charity = pg_escape_string($_POST['Charity']);
$topic_faith = pg_escape_string($_POST['Faith']);
$topic_sacrifice = pg_escape_string($_POST['Sacrifice']);

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

if ($topic_charity != null) {

    $sql2 = "INSERT INTO topic(id, name)
             VALUES($item_id, '$topic_charity';";
    pg_query($con, $sql2);

}
if ($topic_faith != null){
    $sql2 = "INSERT INTO topic(id, name)
             VALUES($item_id, '$topic_faith';";
    pg_query($con, $sql2);

}
if ($topic_sacrifice != null){
    $sql2 = "INSERT INTO topic(id, name)
             VALUES($item_id, '$topic_sacrifice';";
    pg_query($con, $sql2);
}

$sql3 = "INSERT INTO scripture_and_topic(srip_id, topic_id)
             VALUES($item_id, $item_id;";
pg_query($con, $sql3);


pg_close($con);

header("Location: 06Teach.php?insert=Success");
