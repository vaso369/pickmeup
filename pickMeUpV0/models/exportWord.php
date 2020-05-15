<?php 
require_once "../config/connection.php";
require_once "functions.php";
$author=getAuthor();
$word = new COM("Word.Application");
$word->Visible = true;
$word->Documents->Add();
$word->Selection->TypeText("First Name: $author->ime \n Last Name: $author->prezime \n Birthday: $author->datum \n Faculty: $author->skola \n City: $author->grad \n");
$word->Documents[1]->SaveAs("Author.doc");
header("Location: ../index.php?page=about");