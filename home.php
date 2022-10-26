<?php

$boton1="";
$boton2="";
$boton3="";
$boton4="";
$boton5="";
$boton6="";

if(isset($_POST['boton1']))$boton1=$_POST['boton1'];
if(isset($_POST['boton2']))$boton2=$_POST['boton2'];
if(isset($_POST['boton3']))$boton3=$_POST['boton3'];
if(isset($_POST['boton4']))$boton4=$_POST['boton4'];
if(isset($_POST['boton5']))$boton5=$_POST['boton5'];
if(isset($_POST['boton6']))$boton6=$_POST['boton6'];

if($boton1)
{
    echo "redericcionar a snack";
}
if($boton2)
{
    echo "redericcionar a completos";
}
if($boton3)
{
    echo "redericcionar a bebidas";
}
if($boton4)
{
    echo "redericcionar a cafe";
}
if($boton5)
{
    echo "redericcionar a sandwish";
}
if($boton6)
{
    echo "redericcionar a wraps";
}
?>