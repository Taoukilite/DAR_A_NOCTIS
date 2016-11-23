<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 22/11/16
 * Time: 20:28
 */
    include("includes/menubar.php");
    include("controller/infos.php");

?>

<br>
<div class="container">
    <div class="page-header">
        <h1>Professionnels proposant le service <?php echo $_GET['service']; ?></h1>
    </div>

    <div class="row">
            <div style="max-height: 250px; overflow: auto;">
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <th style = "width:20%">Nom</th>
                        <th style="width:20%">Prénom</th>
                        <th style="width:40%">mail</th>
                        <th>Adresse</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="service.php?id=toto">Marie</a></td>
                        <td>Du tronc</td>
                        <td>john@example.com</td>
                        <td>3 rue du cru 5110 Reims</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>
                    <tr>
                        <td><a href="service.php?id=toto">Baby-sitting</a></td>
                        <td>Service à domicile</td>
                        <td>john@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>
                    <tr>
                        <td><a href="service.php?id=toto">Baby-sitting</a></td>
                        <td>Service à domicile</td>
                        <td>john@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>
                    <tr>
                        <td><a href="service.php?id=toto">Baby-sitting</a></td>
                        <td>Service à domicile</td>
                        <td>john@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>                <tr>
                        <td><a href="service.php?id=toto">Baby-sitting</a></td>
                        <td>Service à domicile</td>
                        <td>john@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>                <tr>
                        <td><a href="service.php?id=toto">Baby-sitting</a></td>
                        <td>Service à domicile</td>
                        <td>john@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>                <tr>
                        <td><a href="service.php?id=toto">Baby-sitting</a></td>
                        <td>Service à domicile</td>
                        <td>john@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>                <tr>
                        <td><a href="service.php?id=toto">Baby-sitting</a></td>
                        <td>Service à domicile</td>
                        <td>john@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>                <tr>
                        <td><a href="service.php?id=toto">Baby-sitting</a></td>
                        <td>Service à domicile</td>
                        <td>john@example.com</td><td>3 rue du cru 5110 Reims</td>
                    </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
</body>
</html>
