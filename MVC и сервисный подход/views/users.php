<div>
<?php
foreach($users as $user)
{
    echo " <div> Юзер которого зовут " . "<b>" . htmlspecialchars($user->name ) . "</b>"; 
} 
?>

</div>