<?php
session_start();
require_once '../class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row['class'] != "Cashier"){

    $user_home->redirect('../doctor/doctor.php');
 }

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sample</title>
	<!-- <script  src="../source/bloodhound.min.js" type="text/javascript"></script>
	<script  src="../source/bloodhound.js" type="text/javascript"></script> -->

	
</head>
<style type="text/css" media="all">
@font-face {
    font-family:"Prociono";
    src: url("../font/Prociono-Regular-webfont.ttf");
}
.container {
    margin: 0 auto;
    max-width: 750px;
    text-align: center;
}
.tt-dropdown-menu, .gist {
    text-align: left;
}
html {
    color: #333333;
    font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 18px;
    line-height: 1.2;
}
#scrollable-dropdown-menu .tt-dropdown-menu {
	  max-height: 150px;
	  overflow-y: auto;
	}
.title, .example-name {
    font-family: Prociono;
}
p {
    margin: 0 0 10px;
}
.title {
    font-size: 64px;
    margin: 20px 0 0;
}
.example {
    padding: 30px 0;
}
.example-name {
    font-size: 32px;
    margin: 20px 0;
}
.demo {
    margin: 50px 0;
    position: relative;
}
.typeahead, .tt-query, .tt-hint {
    border: 2px solid #CCCCCC;
    border-radius: 8px 8px 8px 8px;
    font-size: 24px;
    height: 30px;
    line-height: 30px;
    outline: medium none;
    padding: 8px 12px;
    width: 396px;
}
.typeahead {
    background-color: #FFFFFF;
}
.typeahead:focus {
    border: 2px solid #0097CF;
}
.tt-query {
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
    color: #999999;
}
.tt-dropdown-menu {
    background-color: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 8px 8px 8px 8px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    margin-top: 12px;
    padding: 8px 0;
    width: 422px;
}
.tt-suggestion {
    font-size: 18px;
    line-height: 24px;
    padding: 3px 20px;
}
.tt-suggestion.tt-cursor {
    background-color: #0097CF;
    color: #FFFFFF;
}
.tt-suggestion p {
    margin: 0;
}
.gist {
    font-size: 14px;
}
.example-twitter-oss .tt-suggestion {
    padding: 8px 20px;
}
.example-twitter-oss .tt-suggestion + .tt-suggestion {
    border-top: 1px solid #CCCCCC;
}
.example-twitter-oss .repo-language {
    float: right;
    font-style: italic;
}
.example-twitter-oss .repo-name {
    font-weight: bold;
}
.example-twitter-oss .repo-description {
    font-size: 14px;
}
.example-sports .league-name {
    border-bottom: 1px solid #CCCCCC;
    margin: 0 20px 5px;
    padding: 3px 0;
}
.example-arabic .tt-dropdown-menu {
    text-align: right;
}
</style>
<body >





<script type="text/javascript">
	// Instantiate the Bloodhound suggestion engine
var movies = new Bloodhound({
    datumTokenizer: function (datum) {
        return Bloodhound.tokenizers.whitespace(datum.value);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        url: 'http://api.themoviedb.org/3/search/movie?query=%QUERY&api_key=f22e6ce68f5e5002e71c20bcba477e7d',
        filter: function (movies) {
            console.log(movies);
            // Map the remote source JSON array to a JavaScript object array
            return $.map(movies.results, function (movie) {
                return {
                    value: movie.original_title,
                    release_date: movie.release_date
                };
            });
        }
    },
    limit: 10
});

// Initialize the Bloodhound suggestion engine
movies.initialize();

// Instantiate the Typeahead UI
$(document).ready(function(){
$('#scrollable-dropdown-menu .typeahead').typeahead(null, {
    displayKey: 'value',
    source: movies.ttAdapter(),
    templates: {
        suggestion: Handlebars.compile("<p style='padding:6px'><b>{{value}}</b> - Release date {{release_date}} </p>"),
        footer: Handlebars.compile("<b>Searched for '{{query}}'</b>")
    }
});
});
</script>





<div id="scrollable-dropdown-menu"><input class="typeahead"></input></div>
</body>
</html>