<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="C:\xampp\htdocs\e-commerce-PHP\Frontend\css\post.css">
    <title>GrosZizi</title>
</head>

<body>
    <div>

        <form method="POST" action="">
            <div class="w3-container w3-padding">
                <form action="" class="search-bar">


                    <!-- ici le for each  -->
                        <button name="lettre" value={{.ID}}>                
                    <canvas id="myCanvas" width="200" height="100"></canvas>
                    
               {{.Titre}}</button>

                </form>
                <label for="chk" aria-hidden="true">{{.Contenu}}</label>
                <label for="chk" aria-hidden="true">{{.Tag}}</label>
                <label for="chk" aria-hidden="true">{{.Date_Heure}}</label><button name="like" value={{.ID}}>J'aime</button> {{end}}

                </h1>
                <h8>Search : </h8>
                <input type="search" name="search">
                <button class="search-btn" type="submit">
                      </button> <button name="retour" value="retour">retour</button>

            </div>
</body>


</html>