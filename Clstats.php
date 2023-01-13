<?php
session_start();
if($_SESSION['nivel']!=3)
    header("Location: index.html");
include("conectare.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="src/rcrprint.png">
    <link rel="stylesheet" href="css/cl.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clienti</title>
</head>
<body>

<center>
<form method="POST" style="color: white;">
        Oras: <select name="Oras">
            <option>toate</option> 
<option>Alba</option>
<option>Arad</option>
<option>Arges</option>
<option>Bacau</option>
<option>Bihor</option>
<option>Bistrita Nasaud</option>
<option>Botosani</option>
<option>Brasov</option>
<option>Braila</option>
<option>Bucuresti</option>
<option>Buzau</option>
<option>Caras Severin</option>
<option>Calarasi</option>
<option>Cluj</option>
<option>Constanta</option>
<option>Covasna</option>
<option>Dambovita</option>
<option>Dolj</option>
<option>Galati</option>
<option>Giurgiu</option>
<option>Gorj</option>
<option>Harghita</option>
<option>Hunedoara</option>
<option>Ialomita</option>
<option>Iasi</option>
<option>Ilfov</option>
<option>Maramures</option>
<option>Mehedinti</option>
<option>Mures</option>
<option>Neamt</option>
<option>Olt</option>
<option>Prahova</option>
<option>Satu Mare</option>
<option>Salaj</option>
<option>Sibiu</option>
<option>Suceava</option>
<option>Teleorman</option>
<option>Timis</option>
<option>Tulcea</option>
<option>Vaslui</option>
<option>Valcea</option>
<option>Vrancea</option>
        </select>
        <input type="submit" name="sub" value="Arata!" class="btn">
        </form></center>


        
        
<?php
if(isset($_POST['sub']))
{
    $select= $_POST['Oras'];
    if($select=="toate")
        {
            $jud=NULL;
        }
    elseif($select=="Bucuresti")
        {
            $jud="AND oras_sc='".$select."'";
        }
    else
        {
           $jud="AND jud_sec_sc='".$select."'"; 
        }

$s= "SELECT nume, prenume, email, cui, nume_sc, str_sc, nr_str, oras_sc, jud_sec_sc, tel FROM clienti WHERE cnp IS NOT NULL $jud;";

$q=mysqli_query($conect,$s);

    if(mysqli_num_rows($q)>0)
         { 
            while($r=mysqli_fetch_assoc($q))
                {
                    if($r['nume']!='-')
                    {echo "<table style='background-color: white; color: black;'>
                    <tr >
    <td >".$r['nume']."</td>
    <td >".$r['prenume']."</td>
    <td >".$r['email']."</td>
    <td >".$r['cui']."</td>
    <td >".$r['nume_sc']."</td>
    <td >".$r['str_sc']."</td>
    <td >".$r['nr_str']."</td>
    <td >".$r['oras_sc']."</td>
    <td >".$r['jud_sec_sc']."</td>
    <td><a href='tel:".$r['tel']."'>".$r['tel']."</a></td>
    
  </tr></table>

";}
echo '</table></center>';}
                }
    else
        echo "nu exista";

}
?>
</body>
</html>

